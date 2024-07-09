<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breeds = [
            [
                'id' => 1,
                'name' => 'Labrador',
                'type_id' => 1,
                'description' => 'Voici la sélection de nos labradors',
            ],
            [
                'id' => 2,
                'name' => 'Fox terrier',
                'type_id' => 1,
                'description' => 'Voici la sélection de nos fox terriers',
            ],
            [
                'id' => 3,
                'name' => 'Frison',
                'type_id' => 2,
                'description' => 'Voici la sélection de nos frisons',
            ],
            [
                'id' => 4,
                'name' => 'Irish cob',
                'type_id' => 2,
                'description' => 'Voici la sélection de nos irish cobs',
            ],
            [
                'id' => 5,
                'name' => 'Mérinos',
                'type_id' => 3,
                'description' => 'Voici la sélection de nos mérinos',
            ],
            [
                'id' => 6,
                'name' => 'Solognotes',
                'type_id' => 3,
                'description' => 'Voici la sélection de nos solognotes',
            ],
            [
                'id' => 7,
                'name' => 'Landrace',
                'type_id' => 4,
                'description' => 'Voici la sélection de nos landraces',
            ],
            [
                'id' => 8,
                'name' => 'Iberique',
                'type_id' => 4,
                'description' => 'Voici la sélection de nos ibériques',
            ],
        ];

        foreach ($breeds as $breed) {
            \App\Models\Breed::create($breed);
        }
    }
}
