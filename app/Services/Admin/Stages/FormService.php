<?php

namespace App\Services\Admin\Stages;
use App\Models\Form;

class FormService
{
    public function storeFormData($validatedData, $dynamicFields, $request)
    {
      //  dd($validatedData, $dynamicFields, $request);
        foreach ($dynamicFields as $fieldName => $fieldValue) {
            $fieldIdKey = $fieldName . '_field_id';
            $fieldId = $request->input($fieldIdKey);
            if (!empty($fieldValue) && !empty($fieldName) && !is_null($fieldId)) {
                Form::create([
                    'step_user_id' => $validatedData['step_user_id'],
                    'field_id'     => $fieldId,
                    'field_name'   => $fieldName,
                    'field_value'  => $fieldValue,
                ]);
            }
        }

//        foreach ($dynamicFields as $fieldName => $fieldValue) {
//            // Извлекаем field_id для каждого динамического поля
//            $fieldIdKey = $fieldName . '_field_id';
//            $fieldId = $request->input($fieldIdKey);
//
//            if (!empty($fieldValue) && !empty($fieldName) && !is_null($fieldId)) { // Проверяем, что поле не пустое
//                // Сохранение данных в таблицу forms
//                Form::create([
//                    'step_user_id' => $validated['step_user_id'],
//                    'field_id'     => $fieldId, // Сохраняем ID поля
//                    'field_name'   => $fieldName, // Сериализуем имена полей
//                    'field_value'  => $fieldValue, // Сериализуем значения полей
//                ]);
//            }
//        }
    }
}