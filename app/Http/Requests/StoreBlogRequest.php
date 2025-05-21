<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'name' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'short_content' => 'nullable|string|max:500',
            'video_link' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
            'position' => 'nullable|integer|min:0',
            'image_path' => ['nullable', 'image', 'mimes:jpeg,png,jpg'], // Валидация для изображения
        ];
    }
}
