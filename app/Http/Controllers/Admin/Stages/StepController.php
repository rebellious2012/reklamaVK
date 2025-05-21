<?php

namespace App\Http\Controllers\Admin\Stages;

use App\Http\Controllers\Controller;
use App\Models\Step;
use App\Models\Field;
use App\Http\Requests\StepRequest;
use App\Http\Requests\StoreStepRequest;
use App\Http\Requests\UpdateStepRequest;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $steps = Step::with('fields')->get(); // Получить шаги с полями
        return view('admin.steps.index', compact('steps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = Field::all(); // Получить все доступные поля
        return view('admin.steps.create', compact('fields'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StepRequest $request)
    {
        $validatedData = $request->validated();  // Получаем проверенные данные

        // Создание шага
        $step = Step::create([
            'name' => $validatedData['name'],
            'position' => $validatedData['position'] ?? null,
            'note' => $validatedData['note'],  // Сохраняем note
        ]);

        // Привязываем поля к шагу
        if (isset($validatedData['fields'])) {
            $step->fields()->sync($validatedData['fields']);
        }

        return redirect()->route('steps.index')->with('success', 'Шаг успешно создан!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Step $step)
    {
        $fields = Field::all();  // Получить все доступные поля
        return view('admin.steps.edit', compact('step', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StepRequest $request, Step $step)
    {
        $validatedData = $request->validated();

        // Обновляем шаг
        $step->update([
            'name' => $validatedData['name'],
            'position' => $validatedData['position'] ?? null,
        ]);

        // Обновляем привязанные поля, если они указаны
        if (isset($validatedData['fields'])) {
            $step->fields()->sync($validatedData['fields']);
        }

        return redirect()->route('steps.index')->with('success', 'Шаг успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Step $step)
    {
        // Удаляем запись из базы данных
        $step->delete();
        // Возвращаем пользователя на список с сообщением об успехе
        return redirect()->route('steps.index')->with('success', 'Step and associated image deleted successfully!');
    }
}
