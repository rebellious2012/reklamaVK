<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;  // Здесь можно добавить логику авторизации, если нужно
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'nullable|integer',
            'fields' => 'array',  // Массив выбранных полей
            'fields.*' => 'exists:fields,id',  // Проверка существования каждого поля
            'note' => 'nullable|string|max:5000',  // Добавляем валидацию для note
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название шага обязательно для заполнения.',
            'name.string' => 'Название шага должно быть строкой.',
            'name.max' => 'Название шага не должно превышать :max символов.',
            'position.integer' => 'Позиция должна быть целым числом.',
            'fields.array' => 'Поля должны быть представлены в виде массива.',
            'fields.*.exists' => 'Некоторые выбранные поля не существуют.',
        ];
    }
}