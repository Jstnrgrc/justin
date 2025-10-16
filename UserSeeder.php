<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('users')->updateOrInsert(
            ['email' => 'andriesy6@gmail.com'],
            [
                'password' => Hash::make('Password@123'),
                'first_name' => 'Andrie',
                'middle_name' => '',
                'last_name' => 'Sy',
                'ext_name' => '',
                'role' => 'Admin',
                'department_id' => 1,
                'stat' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
