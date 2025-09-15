<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => 'kerjamin/01K56TZSB96G6YSJNE4WNKAADK.png',
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(5)) . '</p>',
            'author_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}