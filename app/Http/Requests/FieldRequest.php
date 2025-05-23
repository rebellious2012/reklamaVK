<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FieldRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'label'                     => 'required|string|max:255',
            'type'                      => 'required|string|in:profile,input,info_simple,phone,info_phone,link,info_link,select,info_select,checkbox,checkbox_required,info_point,confirmation_list,info_checkbox,card,info_card,select_bank,info_select_bank,input_sum,info_input_sum,input_order,info_input_order,input_date,info_input_date,radio_checkbox,radio_simple,textarea,file,info_file,keywords_min,auditoria,button_big,button_simple,button_plus,buttons_red_blue,wait_simple,wait_timer,wait_for_payment,wait_for_payment_success,wait_stage_completed',
            'placeholder'               => 'nullable|string|max:255', // Добавьте это правило
            'position'                  => 'nullable|integer|min:1',
            'steps'                     => 'nullable|array', // Убираем обязательность выбора шагов
            'steps.*'                   => 'exists:steps,id', // Проверка, что шаги существуют, если они переданы
            'options'                   => 'nullable|string',
            'options_confirmation_list' => 'nullable|string',
            'options_checkbox_info'     => 'nullable|string',
            'options_checkbox_radio'    => 'nullable|string',
            'options_select_bank'       => 'nullable|string',
            'options_radio_simple'      => 'nullable|string',
            'slug'                      => [
                'nullable',
                'string',
                Rule::unique('fields')->ignore($this->route('field')), // Игнорировать текущий slug при редактировании
            ],
            'note'                      => 'nullable|string|max:5000', // Добавляем валидацию для note
            'field_input'               => 'nullable|exists:fields,id',
            'field_phone'               => 'nullable|exists:fields,id',
            'field_link'                => 'nullable|exists:fields,id',
            'field_select'              => 'nullable|exists:fields,id',
            'field_card'                => 'nullable|exists:fields,id',
            'field_select_bank'         => 'nullable|exists:fields,id',
            'field_file'                => 'nullable|exists:fields,id',
            'field_input_sum_file'      => 'nullable|exists:fields,id',
            'field_info_input_sum'      => 'nullable|exists:fields,id',
            'field_info_input_order'    => 'nullable|exists:fields,id',
            'field_info_input_date'     => 'nullable|exists:fields,id',
        ];
    }


    public function messages(): array
    {
        return [
            'label.required'   => 'Поле "Название" обязательно для заполнения.',
            'type.required'    => 'Необходимо выбрать тип поля.',
            'type.in'          => 'Недопустимый тип поля. Доступные значения: input,info_simple,phone,info_phone,link,info_link,select,info_select,checkbox,checkbox_required,info_checkbox,card,info_card,select_bank,info_select_bank,input_sum,radio_checkbox,radio_simple,textarea,file,info_file,button_big,button_simple,button_plus,buttons_red_blue,wait_simple,wait_timer,wait_stage_completed.',
            'position.integer' => 'Позиция должна быть целым числом.',
            'options.string'   => 'Параметры должны быть в строчном формате.',
            'slug.unique'      => 'Slug должен быть уникальным.',
        ];
    }
}