<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomElement([
                '$50,000 USD', '$60,000 USD', '$100,000 USD', '750,000 USD', '1000,000 USD'
            ]),
            'location' => 'Remote',
            'schedule' => $this->faker->randomElement(['Full Time','Part Time']),
            'url' => $this->faker->url(),
            'featured' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
