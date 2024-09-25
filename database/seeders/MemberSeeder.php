<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'name' => 'John Doe',
                'user_name' => 'johndoe',
                'email' => 'johndoe@gmail.com',
                'password' => Hash::make('password123'),
                'type' => 'standard',
                'status' => 'active',
                'account_balance' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'user_name' => 'janesmith',
                'email' => 'johndoe@gmail1.com',
                'password' => Hash::make('password123'),
                'type' => 'premium',
                'status' => 'inactive',
                'account_balance' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'user_name' => 'alicejohnson',
                'email' => 'johndoe2@gmail.com',
                'password' => Hash::make('password123'),
                'type' => 'admin',
                'status' => 'active',
                'account_balance' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Brown',
                'user_name' => 'bobbrown',
                'email' => 'johndoe3@gmail.com',
                'password' => Hash::make('password123'),
                'type' => 'standard',
                'status' => 'inactive',
                'account_balance' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Charlie White',
                'user_name' => 'charliewhite',
                'email' => 'johndoe4@gmail.com',
                'password' => Hash::make('password123'),
                'type' => 'premium',
                'status' => 'active',
                'account_balance' => 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
