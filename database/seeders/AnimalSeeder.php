<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // FOR TESTING PURPOSES ONLY
        $animals = [
            [
                'name' => 'Bella',
                'age' => 3,
                'type_id' => 1,
                'breed_id' => 1,
                'description' => 'Labrador amical et énergique, excellent avec les enfants.',
                'price' => 1500.0,
                'image' => '/storage/images/Bella_1720547336.jpg'
            ],
            [
                'name' => 'Max',
                'age' => 4,
                'type_id' => 1,
                'breed_id' => 1,
                'description' => 'Labrador affectueux et joueur, aime les promenades longues.',
                'price' => 1400.0,
                'image' => '/storage/images/Max_1720547360.jpg'
            ],
            [
                'name' => 'Lucky',
                'age' => 2,
                'type_id' => 1,
                'breed_id' => 1,
                'description' => 'Jeune Labrador curieux et intelligent, facile à entraîner.',
                'price' => 1600.0,
                'image' => '/storage/images/Lucky_1720547368.jpg'
            ],
            [
                'name' => 'Daisy',
                'age' => 5,
                'type_id' => 1,
                'breed_id' => 1,
                'description' => 'Labrador doux et calme, parfait pour la compagnie.',
                'price' => 1300.0,
                'image' => '/storage/images/Daisy_1720547376.jpg'
            ],
            [
                'name' => 'Charlie',
                'age' => 6,
                'type_id' => 1,
                'breed_id' => 1,
                'description' => 'Labrador loyal et protecteur, excellent chien de famille.',
                'price' => 1250.0,
                'image' => '/storage/images/Charlie_1720547389.jpg'
            ],
            [
                'name' => 'Thunder',
                'age' => 4,
                'type_id' => 2,
                'breed_id' => 3,
                'description' => 'Frison majestueux avec une belle crinière, très élégant.',
                'price' => 8000.0,
                'image' => '/storage/images/Thunder_1720547554.jpg'
            ],
            [
                'name' => 'Star',
                'age' => 3,
                'type_id' => 2,
                'breed_id' => 3,
                'description' => 'Frison rapide et agile, parfait pour l\'équitation.',
                'price' => 8500.0,
                'image' => '/storage/images/Star_1720547563.jpg'
            ],
            [
                'name' => 'Shadow',
                'age' => 5,
                'type_id' => 2,
                'breed_id' => 3,
                'description' => 'Frison fort et endurant, idéal pour les compétitions.',
                'price' => 9000.0,
                'image' => '/storage/images/Shadow_1720547575.jpg'
            ],
            [
                'name' => 'Blaze',
                'age' => 6,
                'type_id' => 2,
                'breed_id' => 3,
                'description' => 'Frison expérimenté, excellent pour les cavaliers avancés.',
                'price' => 9500.0,
                'image' => '/storage/images/Blaze_1720547585.jpg'
            ],
            [
                'name' => 'Sky',
                'age' => 2,
                'type_id' => 2,
                'breed_id' => 3,
                'description' => 'Jeune Frison prometteur, très docile et facile à entraîner.',
                'price' => 7800.0,
                'image' => '/storage/images/Sky_1720547593.jpg'
            ],
            [
                'name' => 'Fiona',
                'age' => 3,
                'type_id' => 3,
                'breed_id' => 5,
                'description' => 'Mérinos avec une laine douce et abondante, très docile.',
                'price' => 500.0,
                'image' => '/storage/images/Fiona_1720547772.jpg'
            ],
            [
                'name' => 'Luna',
                'age' => 2,
                'type_id' => 3,
                'breed_id' => 5,
                'description' => 'Jeune mérinos, laine de haute qualité, très affectueuse.',
                'price' => 550.0,
                'image' => '/storage/images/Luna_1720547777.jpg'
            ],
            [
                'name' => 'Oscar',
                'age' => 4,
                'type_id' => 3,
                'breed_id' => 5,
                'description' => 'Mérinos robuste avec une excellente qualité de laine.',
                'price' => 600.0,
                'image' => '/storage/images/Oscar_1720547783.jpg'
            ],
            [
                'name' => 'Milo',
                'age' => 5,
                'type_id' => 3,
                'breed_id' => 5,
                'description' => 'Mérinos expérimenté, très calme et facile à gérer.',
                'price' => 650.0,
                'image' => '/storage/images/Milo_1720547791.jpg'
            ],
            [
                'name' => 'Ella',
                'age' => 3,
                'type_id' => 3,
                'breed_id' => 6,
                'description' => 'Solognotes avec une laine épaisse, parfaite pour les fils de qualité.',
                'price' => 620.0,
                'image' => '/storage/images/Ella_1720547799.jpg'
            ],
            [
                'name' => 'Ginger',
                'age' => 4,
                'type_id' => 3,
                'breed_id' => 6,
                'description' => 'Solognotes robuste, adaptée aux climats variés, laine dense.',
                'price' => 580.0,
                'image' => '/storage/images/Ginger_1720547807.jpg'
            ],
            [
                'name' => 'Boris',
                'age' => 3,
                'type_id' => 4,
                'breed_id' => 7,
                'description' => 'Landrace robuste et en bonne santé.',
                'price' => 700.0,
                'image' => '/storage/images/Boris_1720547969.jpg'
            ],
            [
                'name' => 'Toby',
                'age' => 2,
                'type_id' => 4,
                'breed_id' => 7,
                'description' => 'Jeune landrace avec un bon potentiel de croissance, très sociable.',
                'price' => 680.0,
                'image' => '/storage/images/Toby_1720547975.jpg'
            ],
            [
                'name' => 'Duke',
                'age' => 4,
                'type_id' => 4,
                'breed_id' => 7,
                'description' => 'Landrace adulte avec une excellente qualité de viande.',
                'price' => 720.0,
                'image' => '/storage/images/Duke_1720547981.jpg'
            ],
            [
                'name' => 'Lily',
                'age' => 2,
                'type_id' => 4,
                'breed_id' => 8,
                'description' => 'Jeune iberique, très prometteur avec une excellente constitution.',
                'price' => 760.0,
                'image' => '/storage/images/Lily_1720547991.jpg'
            ],
            [
                'name' => 'Duke',
                'age' => 4,
                'type_id' => 4,
                'breed_id' => 8,
                'description' => 'Iberique adulte avec une constitution robuste, idéal pour l\'élevage.',
                'price' => 790.0,
                'image' => '/storage/images/Duke_1720548001.jpg'
            ],
            [
                'name' => 'Blossom',
                'age' => 3,
                'type_id' => 4,
                'breed_id' => 8,
                'description' => 'Iberique curieux et énergique, excellent pour l\'élevage.',
                'price' => 750.0,
                'image' => '/storage/images/Blossom_1720548009.jpg'
            ],
        ];


        foreach ($animals as $animal) {
            \App\Models\Animal::create($animal);
        }
    }
}
