<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $this->call([
            // DEFAULT TYPES AND BREEDS
            TypeSeeder::class,
            BreedSeeder::class,

            // FOR TESTING PURPOSES ONLY
            AnimalSeeder::class,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
