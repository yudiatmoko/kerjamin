<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Teknologi Informasi' => 'code',
            'Penjualan & Pemasaran' => 'storefront',
            'Logistik & Pergudangan' => 'local_shipping',
            'Keuangan & Akuntansi' => 'account_balance',
            'Pendidikan' => 'school',
            'Kesehatan' => 'health_and_safety',
            'Administrasi' => 'work',
        ];

        $name = fake()->unique()->randomElement(array_keys($categories));

        $icon = $categories[$name];

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'icon' => $icon,
        ];
    }
}
