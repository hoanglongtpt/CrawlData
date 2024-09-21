<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * */
    public function run()
    {
        User::create([
            'name' => 'admin', 
            'user_name' => 'admin', 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'type' => 'admin',
            'status' => 1,
        ]);
    }
}
