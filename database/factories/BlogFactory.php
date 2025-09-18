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
        $thumbnails = [
            'youtube-thumbnails_rs1tmr.png',
            'Stacked-Angled-Heading-Pink-Black-youtube-thumbnail_ek4jlj.jpg',
            'canva-black-white-red-simple-modern-elegant-video-how-to-youtube-thumbnail-wjF6tWg5Jeg_nv7wpv.jpg',
            'canva-modern-top-10-shocking-moments-youtube-thumbnail-nW-Lj8Zvf-4_sr5idd.jpg',
            'canva-most-attractive-youtube-thumbnail-wK95f3XNRaM_xhuazw.jpg',
        ];

        $title = fake()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => fake()->unique()->randomElement($thumbnails),
            'content' => '<p>' . implode('</p><p>', fake()->paragraphs(5)) . '</p>',
            'author_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}