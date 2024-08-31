<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job' => fake()->jobTitle(),
            'employer_id' => Employer::factory(),
            'salary' => fake()->numberBetween(10000, 120000),

            // 'slug' => function (array $attributes) {
            //     return Str::slug($attributes['job']) . '-' . uniqid();
            // },
        ];
    }
}
