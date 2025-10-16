<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     *  @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'name'=>'IT Department',
                'description'=>'Handles IT System and Network Infrastructure',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'HR Department',
                'description'=>'Manage personnel, hiring and employee welfare',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Finance Department',
                'description'=>'Responsible for budgeting and accouting',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
