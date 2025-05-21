<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
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
    public function rules()
    {
        return [
            'step_user_id' => 'required|exists:step_user,id', // Убедитесь, что step_user_id существует в таблице step_user
            'field_name' => 'required|string|max:255', // Имя поля (slug)
            'field_value' => 'nullable|string', // Значение поля
        ];
    }

    public function messages()
    {
        return [
            'step_user_id.required' => 'Поле step_user_id обязательно для заполнения.',
            'step_user_id.exists' => 'Выбранный step_user_id не существует.',
            'field_name.required' => 'Поле имени обязательно для заполнения.',
            'field_name.string' => 'Имя поля должно быть строкой.',
            'field_name.max' => 'Имя поля не должно превышать 255 символов.',
            'field_value.string' => 'Значение поля должно быть строкой.',
        ];
    }
}
