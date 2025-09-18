<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
        ]);

        $this->call([
            BlogSeeder::class,
        ]);

        $this->call([
            CategorySeeder::class,
        ]);

        $this->call([
            CompanySeeder::class,
        ]);

        $this->call([
            EducationSeeder::class,
        ]);

        $this->call([
            ExperienceLevelSeeder::class,
        ]);

        $this->call([
            JobTypeSeeder::class,
        ]);
        
        $this->call([
            JobListingSeeder::class,
        ]);

    }
}
