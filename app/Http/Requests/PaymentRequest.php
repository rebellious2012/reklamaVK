<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'amount' => 'required|numeric|min:0.01',
            'status' => 'required|string|in:pending,approved,rejected',
            'image_path' => 'nullable|string|max:255', // Если это путь к файлу
            'stage_id' => 'nullable|exists:stages,id',
            'user_id' => 'required|exists:users,id',
            'payment.note' => 'nullable|string|max:1000', // Для таблицы payments
            'payment_user.note' => 'nullable|string|max:1000', // Для таблицы payment_user
        ];
    }
    public function messages()
    {
        return [
            'amount.required' => 'Поле "Сумма" обязательно для заполнения.',
            'status.in' => 'Статус должен быть одним из следующих: pending, approved, rejected.',
            'payment.note.max' => 'Заметка в платежах не должна превышать 1000 символов.',
            'payment_user.note.max' => 'Заметка в промежуточной таблице не должна превышать 1000 символов.',
            // Другие сообщения об ошибках можно добавить по мере необходимости
        ];
    }
}
