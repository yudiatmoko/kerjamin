<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobType>
 */
class JobTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jobTypes = [
            'Penuh Waktu',
            'Paruh Waktu',
            'Magang',
            'Freelance',
            'Jarak Jauh',
            'Volunteer',
        ];

        $name = fake()->unique()->randomElement($jobTypes);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
