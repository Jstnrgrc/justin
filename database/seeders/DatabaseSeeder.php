<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed departments first
        $this->call([
            DepartmentSeeder::class,
        ]);

        // Now you can safely create users with department_id = 1
        User::factory()->create([
            'first_name' => 'Test',
            'middle_name' => null,
            'last_name' => 'User',
            'ext_name' => null,
            'email' => 'stewart19@example.com',
            'password' => bcrypt('password'),
            'department_id' => 1,
        ]);
    }
}