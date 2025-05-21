<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'integer'], // Валидация для позиции
            'group_name' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'short_content' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'svg_code' => ['required', 'string'], // Валидация для SVG кода
            'color' => ['required', 'string', 'max:7'], // Валидация для цвета (например, HEX-код)
            'image_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg'], // Валидация для изображения
            'status' => 'required|in:draft,published',
            'slug' => [
                'nullable',
                'string',
                Rule::unique('stages')->ignore($this->route('stage')), // Игнорировать текущий slug при редактировании
            ],

//            // Validation for steps
//            'steps' => 'nullable|array', // The steps field must be an array, if provided
//            'steps.*.id' => 'exists:steps,id', // Each step's ID must exist in the steps table
//            'steps.*.position' => 'nullable|integer', // Each step's position must be an integer, if provided
//
//            // Validation for adding new steps
//            'new_step_id' => 'nullable|exists:steps,id', // Validate the ID of a newly added step
//            'new_step_position' => 'nullable|integer', // Validate the position of the new step, if provided

            'steps' => ['nullable', 'array'],
            'steps.*.id' => ['nullable', 'exists:steps,id'],
            'steps.*.position' => ['nullable', 'integer'],
            'new_step_id' => ['nullable', 'exists:steps,id'],
            'new_step_position' => ['nullable', 'integer'],
        ];
    }
    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            // Name validation
            'name.required' => 'Назва є обов’язковою.',
            'name.string' => 'Назва повинна бути рядком.',
            'name.max' => 'Назва не повинна перевищувати 255 символів.',

            // Position validation
            'position.required' => 'Позиція є обов’язковою.',
            'position.integer' => 'Позиція повинна бути цілим числом.',

            // Short content validation
            'short_content.required' => 'Короткий опис є обов’язковим.',
            'short_content.string' => 'Короткий опис повинен бути рядком.',
            'short_content.max' => 'Короткий опис не повинен перевищувати 255 символів.',

            // Description validation
            'description.required' => 'Опис є обов’язковим.',
            'description.string' => 'Опис повинен бути рядком.',

            // SVG code validation
            'svg_code.required' => 'SVG код є обов’язковим.',
            'svg_code.string' => 'SVG код повинен бути рядком.',

            // Color validation
            'color.required' => 'Колір є обов’язковим.',
            'color.string' => 'Колір повинен бути рядком.',
            'color.max' => 'Колір не повинен перевищувати 7 символів.',

            // Image validation
            'image_path.image' => 'Файл повинен бути зображенням.',
            'image_path.mimes' => 'Зображення повинно бути у форматі: jpeg, png, jpg.',

            // Steps validation
            'steps.array' => 'Кроки повинні бути масивом.',
            'steps.*.id.exists' => 'Обраний крок не існує.',
            'steps.*.position.integer' => 'Позиція кроку повинна бути цілим числом.',

            // New step validation
            'new_step_id.exists' => 'Обраний новий крок не існує.',
            'new_step_position.integer' => 'Позиція нового кроку повинна бути цілим числом.',
        ];
    }
}
