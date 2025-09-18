<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $educations = [
            'SMA / SMK Sederajat',
            'Diploma (D3)',
            'Sarjana (S1)',
            'Magister (S2)',
            'Doktor (S3)',
        ];

        $name = fake()->unique()->randomElement($educations);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
