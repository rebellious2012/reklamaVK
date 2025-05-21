<?php

namespace App\Http\Controllers\Admin\Stages;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Models\Stage;
use App\Models\Step;
use Illuminate\Support\Facades\Storage;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Получаем все стадии из БД
        $stages = Stage::all();

        return view('admin/stages/index', compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStageRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image_path')) {
            // Сохранение изображения в кастомный диск 'stages'
            $imagePath = $request->file('image_path')->store('images', 'stages');
            $data['image_path'] = $imagePath;
        }
        // Получаем цвет из input
        $color = $request->input('color', '#000000'); // цвет по умолчанию

        // Получаем исходный SVG код из textarea
        $svgCode = $request->input('code_svg', ''); // или другое имя поля

        // Заменяем все вхождения fill, кроме белого цвета (в формате #ffffff или white)
        $updatedSvgCode = preg_replace(
            '/fill="((?!#ffffff|white)[^"]+)"/i', // регулярное выражение для поиска всех fill, кроме белого
            'fill="' . $color . '"',               // замена на выбранный цвет
            $svgCode
        );

        // Теперь в $updatedSvgCode содержится обновленный SVG-код с измененным цветом
        $data['svg_code'] = $updatedSvgCode;
        // Логируем данные для проверки
        // \Log::info($data); // Это поможет увидеть, какие данные сохраняются

        Stage::create($data);

        return redirect()->route('stages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $stage)
    {
        // Eager load the steps associated with the stage
        $stage->load('steps');
        // Retrieve steps that are not already added to the stage
        $availableSteps = Step::whereNotIn('id', $stage->steps->pluck('id'))->get();
        return view('admin.stages.edit', compact('stage', 'availableSteps') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStageRequest $request, Stage $stage): \Illuminate\Http\RedirectResponse
    {
    // dd($request);
        // Валидация данных
        $data = $request->validated();

        // Проверяем, загрузил ли пользователь новое изображение
        if ($request->hasFile('image_path')) {
            // Удаляем старое изображение, если оно существует
            if ($stage->image_path) {
                Storage::disk('stages')->delete($stage->image_path);
            }

            // Сохраняем новое изображение
            $imagePath = $request->file('image_path')->store('images', 'stages');
            $data['image_path'] = $imagePath;
        }

        // Получаем цвет из input (например, поле 'color')
        $color = $request->input('color', '#000000'); // используем цвет по умолчанию, если не указан

        // Получаем исходный SVG код из textarea (например, поле 'svg_code')
        $svgCode = $request->input('svg_code', '');

        // Заменяем все вхождения fill, кроме белого цвета
        // Заменяем все вхождения fill, кроме белого цвета (в формате #ffffff или white)
        $updatedSvgCode = preg_replace(
            '/fill="((?!#ffffff|white)[^"]+)"/i',  // регулярное выражение для поиска всех fill, кроме белого
            'fill="' . $color . '"',               // замена на выбранный цвет
            $svgCode
        );

        // Обновляем поле svg_code в массиве данных
        $data['svg_code'] = $updatedSvgCode;

        // Обновляем запись
        $stage->update($data);



        // // Handle updating existing steps
        // if ($request->has('steps')) {
        //     $steps = $request->input('steps');

        //     // Ensure steps is an array
        //     if (is_array($steps)) {
        //         foreach ($steps as $step) {
        //             // Ensure each $step is an array and has 'id' and 'position' keys
        //             if (is_array($step) && isset($step['id']) && isset($step['position'])) {
        //                 $stage->steps()->updateExistingPivot($step['id'], ['position' => $step['position']]);
        //             }
        //         }
        //     }
        // }
              // Синхронизация шагов
              if ($request->has('steps')) {
                $stepIds = $request->input('steps'); // Просто массив ID шагов

                // Получаем текущие связанные шаги с их позициями
                $currentSteps = $stage->steps()
                ->withPivot('position') // Указывает, что используется столбец из промежуточной таблицы
                ->pluck('stage_step.position', 'steps.id')
                ->toArray();


                // Формируем массив для sync
                $syncData = [];

                foreach ($stepIds as $stepId) {
                    if (isset($currentSteps[$stepId])) {
                        // Если шаг уже связан, сохраняем текущую позицию
                        $syncData[$stepId] = ['position' => $currentSteps[$stepId]];
                    } else {
                        // Если шаг новый, добавляем с позицией по умолчанию
                        $syncData[$stepId] = ['position' => 0]; // Задайте значение по умолчанию
                    }
                }

                // Выполняем синхронизацию
                $stage->steps()->sync($syncData);
            } else {
                // Если ключ 'steps' отсутствует, удаляем все связанные шаги
                $stage->steps()->detach();
            }


              // Handle new step addition
        if ($request->filled('new_step_id')) {
            $stage->steps()->attach(
                $request->input('new_step_id'),
                ['position' => $request->input('new_step_position')]
            );
        }
        return redirect()->route('stages.index')->with('success', 'Stage updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stage $stage): \Illuminate\Http\RedirectResponse
    {
        // Проверяем, есть ли изображение у записи
        if ($stage->image_path) {
            // Удаляем изображение с диска 'stages'
            Storage::disk('stages')->delete($stage->image_path);
        }

        // Удаляем запись из базы данных
        $stage->delete();

        // Возвращаем пользователя на список с сообщением об успехе
        return redirect()->route('stages.index')->with('success', 'Stage and associated image deleted successfully!');
    }
}
