<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

        {
            DB::table('roles')->insert([
                [
                    'name' => 'Admin',
                    'description' => 'Administrator role',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'User',
                    'description' => 'User role',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                //Support
                [
                    'name' =>'Support',
                    'description' => 'Support role',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }

}
