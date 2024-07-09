<?php

namespace App\Services;

use App\Models\Breed;

class BreedService
{
    public function getAllBreeds($typeId = null)
    {
        return Breed::when($typeId, function ($query, $typeId) {
            // check if there is at leat one animal with the given breed_id
            // if not, return an empty collection
            $query->whereHas('animals', function ($query) use ($typeId) {
                $query->where('type_id', $typeId);
            });
        })->get();
    }
}
