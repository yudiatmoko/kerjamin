<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExperienceLevel>
 */
class ExperienceLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $experienceLevels = [
            'Fresh Graduate',
            '0 - 1 Tahun',
            '3 - 5 Tahun',
            'Lebih dari 5 Tahun',
        ];

        $name = fake()->unique()->randomElement($experienceLevels);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
