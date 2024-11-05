<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('$2y$10$jW.0W3pY.w9l.N2wZ7F3uO.R37/Qk7hL5c/C3oZq9u/q09d.x/q'),
            'email' => 'admin@example.com',
            'role' => 'Администратор',
            'first_name' => 'Администратор',
            'last_name' => 'Системы',
            'phone' => '+79991234567',
        ]);

        User::create([
            'username' => 'user1',
            'password' => bcrypt('$2y$10$jW.0W3pY.w9l.N2wZ7F3uO.R37/Qk7hL5c/C3oZq9u/q09d.x/q'),
            'email' => 'user1@example.com',
            'role' => 'Клиент',
            'first_name' => 'Иван',
            'last_name' => 'Иванов',
            'phone' => '+79991234568',
        ]);
    }
}
