<?php

namespace Database\Factories\Modules\Career\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modules\Career\Models\JobApplication;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobApplicationFactory extends Factory
{
    protected $model = JobApplication::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_id'=>1,
            'first_name'=>$this->faker->word(),
            'last_name'=>$this->faker->word(),
            'email'=>$this->faker->email(),
            'country_code'=>'+971',            
            'phone_number'=>$this->faker->phoneNumber(),
            'status'=>$this->faker->randomElement(['new','inprogress','closed']),
            'resume_url'=>'test',
            'cover'=>$this->faker->word()
        ];
    }
}
