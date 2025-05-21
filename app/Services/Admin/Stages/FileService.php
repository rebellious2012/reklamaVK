<?php



namespace App\Services\Admin\Stages;



use App\Models\Form;

use Illuminate\Http\UploadedFile;



class FileService

{

    public function storeFiles($files, $stepUserId)

    {

        foreach ($files as $fieldId => $file) {

            // Используем только ID пользователя для создания уникальной папки

            $userDirectory = auth()->id();



            // Получаем оригинальное имя файла

            $originalFileName = $file->getClientOriginalName();



            // Сохраняем файл в хранилище 'user_documents' в папке с именем, соответствующим ID пользователя

            $path = $file->storeAs($userDirectory, $originalFileName, 'user_documents');



            // Сохраняем информацию в базу данных

            \App\Models\Form::create([

                'step_user_id' => $stepUserId,

                'field_id'     => $fieldId,

                'field_name'   => 'file', // Имя поля

                'field_value'  => $path, // Сохраняем путь к файлу в поле field_value

            ]);
        }
    }
}
