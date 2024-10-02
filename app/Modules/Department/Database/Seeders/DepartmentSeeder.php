<?php

namespace App\Modules\Department\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Modules\Department\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'HR',
                'description' => 'Human Resources',
                'created_by' => 1,
            ],
            [
                'name' => 'Admin',
                'description' => 'Admin',
                'created_by' => 1,
            ],
            [
                'name' => 'IT Services & Delivery',
                'description' => 'IT Services & Delivery',
                'created_by' => 1,
            ],
            [
                'name' => 'Finance',
            'description' => 'Finance',
            'created_by' => 1,
            ],
           
        ];

        Department::insert($departments);
        // Insert data into the departments table
        //DB::table('departments')->insert($departments);
    }
}
