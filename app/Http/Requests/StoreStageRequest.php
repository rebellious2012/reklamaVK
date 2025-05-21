<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStageRequest extends FormRequest
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
        ];
    }
}
