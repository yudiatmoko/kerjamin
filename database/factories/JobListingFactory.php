<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Education;
use App\Models\ExperienceLevel;
use App\Models\JobType;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $attachments = [
            'kerjamin/01K5E2184CFBPMZSE8NFRPF5N4.pdf',
            'kerjamin/01K5E1Y9MYZ70JHBWT0ADR9EMB.pdf',
            'kerjamin/01K5E249HNJXT01KHK808ZQ2ZB.pdf',
            'it-service-desk-v2_ajs1j0.png',
            'marketing-support-v1_r6sebs.png',
            'desk-sales-v1_jawfjg.png',
        ];

        $attachmentPath = fake()->boolean(70)
            ? fake()->randomElement($attachments)
            : null;

        return [
            'title' => fake()->jobTitle(),
            'description' => '<p>' . implode('</p><p>', fake()->paragraphs(4)) . '</p>',
            'qualification' => '<p>' . implode('</p><p>', fake()->paragraphs(3)) . '</p>',
            'location' => fake()->city() . ', ' . fake()->state(),
            'deadline' => fake()->dateTimeBetween('+1 week', '+1 months'),
            'application_link' => fake()->url(),
            'attachment' => $attachmentPath,
            'is_active' => fake()->boolean(80),
            'views_count' => fake()->numberBetween(50, 2500),

            'company_id' => Company::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'education_id' => Education::inRandomOrder()->first()->id,
            'experience_level_id' => ExperienceLevel::inRandomOrder()->first()->id,
            'job_type_id' => JobType::inRandomOrder()->first()->id,
        ];
    }
}