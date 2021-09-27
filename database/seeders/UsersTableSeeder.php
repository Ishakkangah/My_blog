<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Ishakk angah',
            'username' => 'iiron2',
            'email' => 'Ishakkangah@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
