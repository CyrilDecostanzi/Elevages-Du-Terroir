<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'id' => 1,
                'name' => 'Chien',
                'description' => 'Voici la sélection de nos chiens',
            ],
            [
                'id' => 2,
                'name' => 'Cheval',
                'description' => 'Voici la sélection de nos chevaux',
            ],
            [
                'id' => 3,
                'name' => 'Mouton',
                'description' => 'Voici la sélection de nos moutons',
            ],
            [
                'id' => 4,
                'name' => 'Cochon',
                'description' => 'Voici la sélection de nos cochons'
            ],
        ];

        foreach ($types as $type) {
            \App\Models\Type::create($type);
        }
    }
}
