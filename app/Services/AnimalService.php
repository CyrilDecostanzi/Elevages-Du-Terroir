<?php

namespace App\Services;

use App\Models\Animal;

class AnimalService
{

    public function getFilteredAnimals($filters, $sortBy, $sortOrder, $perPage)
    {
        $query = Animal::with('type', 'breed');

        if (!empty($filters['type_id'])) {
            $query->where('type_id', $filters['type_id']);
        }

        if (!empty($filters['breed_id'])) {
            $query->where('breed_id', $filters['breed_id']);
        }

        if (!empty($filters['is_sold'])) {
            $query->where('is_sold', false);
        }

        return $query->orderBy($sortBy, $sortOrder)
            ->paginate($perPage)->withQueryString();
    }

    public function switchSoldStatus($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->is_sold = !$animal->is_sold;
        $animal->save();
    }

    public function deleteAnimal($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
    }

    public function getAnimal($id)
    {
        return Animal::findOrFail($id);
    }

    public function updateAnimal($id, $data)
    {
        $animal = Animal::findOrFail($id);
        $animal->update($data);
    }

    public function createAnimal($data)
    {
        Animal::create($data);
    }
}
