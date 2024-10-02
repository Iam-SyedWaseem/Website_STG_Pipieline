<?php

namespace Database\Factories\Modules\Department\Models;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Modules\Department\Models\Department;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DepartmentFactory extends Factory
{

    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'name' => $this->faker->company,
            'description' => $this->faker->text,
            'created_by' => 1,
        ];
    }
}
