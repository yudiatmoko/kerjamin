<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $logos = [
            'placeholder-icon-vector-isolated-white-background-your-web-mobile-app-design-placeholder-logo-concept-placeholder-icon-134071364_sr9eby.jpg',
            'logoipsum-3-K0KDtd_hr4rwc.png',
            'elegant-peacock-logo-design-monochrome-featuring-placeholder-text_906185-808_dqpj1g.jpg',
            'colourful-business-logo-company-name-260nw-1779060299_v2oams.jpg',
            'depositphotos_78017774-stock-illustration-logo-abstract-triangle-vector_zyf3a5.webp',
            'Free-PlaceHolder-Logo_bjvrfl.jpg',
            'placeholder-logo-design-template-vector_qpp09l.jpg',
            'placeholder-logo-design-template-vector_rbpop2.jpg'
        ];

        return [
            'name' => fake()->company(),
            'description' => '<p>' . fake()->paragraph(3) . '</p>',
            'location' => fake()->city(),
            'logo' => fake()->randomElement($logos),
            'website' => 'https://' . fake()->domainName(),
        ];
    }
}
