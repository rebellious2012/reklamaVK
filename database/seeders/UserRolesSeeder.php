<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserRolesSeeder extends Seeder
{
    public function run()
    {
        $firstUser = User::first();

        if ($firstUser) {
            // Получаем роль администратора
            $adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');

            // Назначаем роль первому пользователю
            DB::table('role_user')->insert([
                'user_id' => $firstUser->id,
                'role_id' => $adminRoleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
