<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StagesSeeder extends Seeder
{
    public function run()
    {
        // Путь к вашему JSON файлу
        $jsonFilePath = storage_path('app/public/stages.json');

        // Декодируем JSON в массив
        $data = json_decode(file_get_contents($jsonFilePath), true);

        // Проверяем, что данные успешно загружены
        if (json_last_error() !== JSON_ERROR_NONE) {
            \Log::error('Ошибка декодирования JSON: ' . json_last_error_msg());
            return;
        }

        // Вставляем или обновляем данные в таблицу stages
        foreach ($data as $item) {
            // Отладка: выводим текущий элемент перед вставкой или обновлением
            \Log::info('Обработка элемента: ', $item);

            DB::table('stages')->updateOrInsert(
                ['id' => $item['id']], // Уникальный идентификатор для проверки
                [
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                    'position' => $item['position'],
                    'group_name' => $item['group_name'],
                    'price' => $item['price'] ?: 0,
                    'short_content' => $item['short_content'],
                    'description' => $item['description'],
                    'svg_code' => $item['svg_code'],
                    'color' => $item['color'],
                    'image_path' => $item['image_path'],
                    'status' => $item['status'] ?? "draft",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}