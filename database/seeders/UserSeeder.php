<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => ' ',
            'middle_name' => null,
            'last_name' => ' ',
            'ext_name' => null,
            'email' => 'example@gmail.com',
            'password' => Hash::make('password'),
            'department_id' => 1,
        ]);
    }
}