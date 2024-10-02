<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Crystawall1901'),
            
        ]);

        $modules = ['Department']; // List of your modules

        foreach ($modules as $module) {
           // $this->call(app_path("Modules/{$module}/Database/Seeders"));
            $this->call([
                \App\Modules\Department\Database\Seeders\DepartmentSeeder::class,
                // Add other module seeders here
            ]);
        }
       
    }
}
