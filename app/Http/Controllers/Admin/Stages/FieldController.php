<?php

namespace App\Http\Controllers\Admin\Stages;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Http\Requests\FieldRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Payment;
use App\Models\Step;
use App\Models\Stage;
use Illuminate\Support\Facades\DB;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::all();

        return view('admin/fields/index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $steps = Step::all(); // Получаем все шаги из базы данных
        $fields = Field::all(); // Получаем все поля из базы данных

        return view('admin.fields.create', compact('steps', 'fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FieldRequest $request)
    {
        // Данные, прошедшие валидацию, будут доступны в $request
        $validatedData = $request->validated();
        // Преобразование опций в JSON
        $options_array = [
            $request->input('options'),
            $request->input('options_confirmation_list'),
            $request->input('options_checkbox_info'),
            $request->input('options_checkbox_radio'),
            $request->input('options_select_bank'),
            $request->input('options_radio_simple'),
        ];
        $options_array = array_filter($options_array);
        $options_array = array_values($options_array);
        if (array_key_exists(0, $options_array)) {
            $options = $options_array[0];
            $optionsArray = !empty($options) ? array_map('trim', explode(';', $options)) : [];
            $optionsArray = array_filter($optionsArray);
            $validatedData['options'] = json_encode($optionsArray);
        }

        $validatedData_parent_id = [
            $validatedData['field_input'] ?? null,
            $validatedData['field_phone'] ?? null,
            $validatedData['field_link'] ?? null,
            $validatedData['field_select'] ?? null,
            $validatedData['field_card'] ?? null,
            $validatedData['field_select_bank'] ?? null,
            $validatedData['field_file'] ?? null,
            $validatedData['field_input_sum_file'] ?? null,
            $validatedData['field_info_input_sum'] ?? null,
            $validatedData['field_info_input_order'] ?? null,
            $validatedData['field_info_input_date'] ?? null,
        ];
        $validatedData_parent_id = array_filter($validatedData_parent_id);
        $validatedData_parent_id = array_values($validatedData_parent_id);
        if (sizeof($validatedData_parent_id) > 0) {
            $validatedData['parent_id'] = $validatedData_parent_id[0];
        }

        // Создание нового поля
        $field = Field::create($validatedData);
        // Присоединение шагов, если они были выбраны
        $stepId = null;
        if (!empty($validatedData['steps'])) {
            $field->steps()->sync($validatedData['steps']);
            $stepId = reset($validatedData['steps']);
        }
        if ($validatedData['type'] == 'input_sum') {
            // Создаем запись в payments
            $payment = Payment::create([
                'note' => '',
            ]);

            // Если шаг был найден, ищем соответствующий этап
            if ($stepId) {
                $stepDB = Step::find($stepId);
                if ($stepDB && $stepDB->stages !== null) {
                    // Получаем ID первого этапа, связанного с шагом
                    $stageID = $stepDB->stages->first()->id;

                    // Создаем запись в payment_stage, связывая payment и stage
                    DB::table('payment_stage')->insert([
                        'payment_id' => $payment->id,
                        'stage_id'   => $stageID,
                        'field_id'   => $field->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return redirect()->route('fields.index')->with('success', 'Поле успешно создано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        $parent_array = [
            "input"       => "info_simple",
            "phone"       => "info_phone",
            "link"        => "info_link",
            "select"      => "info_select",
            "card"        => "info_card",
            "select_bank" => "info_select_bank",
            "input_sum"   => "info_input_sum",
            "input_order" => "info_input_order",
            "input_date"  => "info_input_date",
            "file"        => "info_file",

        ];
        $children_array = [
            "info_simple"      => "input",
            "info_phone"       => "phone",
            "info_link"        => "link",
            "info_select"      => "select",
            "info_card"        => "card",
            "info_select_bank" => "select_bank",
            "info_input_sum"   => "input_sum",
            "info_input_order" => "input_order",
            "info_input_date"  => "input_date",
            "info_file"        => "file",
        ];
        $array = [
            "checkbox",
            "checkbox_required",
            "info_point",
            "confirmation_list",
            "info_checkbox",
            "radio_checkbox",
            "radio_simple",
            "textarea",
            "keywords_min",
            "auditoria",
            "button_big",
            "button_simple",
            "button_plus",
            "buttons_red_blue",
            "wait_simple",
            "wait_timer",
            "wait_for_payment",
            "wait_for_payment_success",
            "wait_stage_completed",

            "profile",
        ];
        $relation_view = '';
        if (array_key_exists($field->type, $parent_array)) {
            $children_type = $parent_array[$field->type];
            $childrenFields = Field::where('type', $children_type)->get();
            $relation_view = view('admin.fields.parts.edit.relation_view', ['title' => 'Дочернее поле', 'fields' => $childrenFields, 'field' => $field])->render();
        } elseif (array_key_exists($field->type, $children_array)) {
            $parent_type = $children_array[$field->type];
            $parentFields = Field::where('type', $parent_type)->get();
            $relation_view = view('admin.fields.parts.edit.relation_view', ['title' => 'Родительское поле', 'fields' => $parentFields, 'field' => $field])->render();
        }
        $fields = Field::all();
        $steps = Step::all();
        $stages = Stage::all();

        return view('admin.fields.edit', compact('field', 'steps', 'stages', 'fields', 'relation_view'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FieldRequest $request, Field $field)
    {
        // Получаем валидированные данные
        $validatedData = $request->validated();

         // Преобразуем options (если переданы) из строки с ; в JSON
    if ($request->filled('options')) {
        $optionsArray = array_filter(array_map('trim', explode(';', $request->input('options'))));
        $validatedData['options'] = json_encode($optionsArray, JSON_UNESCAPED_UNICODE);
    }

        // Обновляем поле
        $field->update($validatedData);
        // Обновляем steps
        $field->steps()->sync($request->input('steps'));



        return redirect()->route('fields.index')->with('success', 'Поле успешно обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        // Удаляем запись из базы данных
        $field->delete();

        // Возвращаем пользователя на список с сообщением об успехе
        return redirect()->route('fields.index')->with('success', 'Field and associated image deleted successfully!');
    }
}
