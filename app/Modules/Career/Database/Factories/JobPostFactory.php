<?php

namespace Database\Factories\Modules\Career\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Career\Models\JobPost;
use App\Modules\Department\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobPostFactory extends Factory
{
    protected $model = JobPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>$this->faker->word(),
            'description'=>$this->faker->paragraph(),
            'skills'=>$this->faker->word(),
            'location'=>$this->faker->city(),
            'dept_id'=>Department::factory(),
            'is_active'=>$this->faker->randomElement(['0','1']),
            'posted_date'=> $this->faker->dateTimeBetween('-1 month', 'now'),
            'expiry_date'=>$this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
