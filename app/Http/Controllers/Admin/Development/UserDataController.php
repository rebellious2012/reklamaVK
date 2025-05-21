<?php

namespace App\Http\Controllers\Admin\Development;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Http\Requests\FieldRequest;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Payment;
use App\Models\Step;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;

class UserDataController extends Controller
{
    public function clearUserData($user_id)
    {
        // Найдем пользователя по ID
        $user = User::findOrFail($user_id);

        // Удаление данных пользователя из связанных таблиц
        DB::transaction(function () use ($user) {
            // Найдем все записи из step_user для конкретного пользователя
            $stepUserIds = DB::table('step_user')->where('user_id', $user->id)->pluck('id');

            // Удаляем связанные формы из таблицы forms
            DB::table('forms')->whereIn('step_user_id', $stepUserIds)->delete();

            // Удаляем записи из таблицы step_user
            DB::table('step_user')->where('user_id', $user->id)->delete();

            // Удаляем записи из таблицы stage_user
            DB::table('stage_user')->where('user_id', $user->id)->delete();

            // Удаляем записи из таблицы payment_user
            DB::table('payment_user')->where('user_id', $user->id)->delete();
        });

        return response()->json(['message' => 'Данные пользователя успешно удалены']);
    }
    public function clearAdminData()
    {
        // Найдем пользователя по ID
        $user = User::findOrFail(1);

        // Удаление данных пользователя из связанных таблиц
        DB::transaction(function () use ($user) {
            // Найдем все записи из step_user для конкретного пользователя
            $stepUserIds = DB::table('step_user')->where('user_id', $user->id)->pluck('id');

            // Удаляем связанные формы из таблицы forms
            DB::table('forms')->whereIn('step_user_id', $stepUserIds)->delete();

            // Удаляем записи из таблицы step_user
            DB::table('step_user')->where('user_id', $user->id)->delete();

            // Удаляем записи из таблицы stage_user
            DB::table('stage_user')->where('user_id', $user->id)->delete();

            // Удаляем записи из таблицы payment_user
            DB::table('payment_user')->where('user_id', $user->id)->delete();

            // Получаем все ключи сессии
            $allSessionKeys = session()->all();

            // Проходим по ключам и удаляем те, которые начинаются с 'started_stage_'
            foreach ($allSessionKeys as $key => $value) {
                if (strpos($key, 'started_stage_') === 0) {
                    session()->forget($key);
                }
            }
        });

        return response()->json(['message' => 'Данные пользователя успешно удалены']);
    }
}

