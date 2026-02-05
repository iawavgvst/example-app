<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if ( ! empty(DB::table('users')->count())) {
            return;
        }

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'created_at' => DB::raw('NOW()'),
        ]);

        /**
         * Для тестовых дополнительных пользователей.
         */

        DB::table('users')->insert([
            'username' => 'assignee',
            'password' => Hash::make('assignee'),
            'role' => 'assignee',
            'created_at' => DB::raw('NOW()'),
        ]);

        DB::table('users')->insert([
            'username' => 'owner',
            'password' => Hash::make('owner'),
            'role' => 'owner',
            'created_at' => DB::raw('NOW()'),
        ]);
    }
}
