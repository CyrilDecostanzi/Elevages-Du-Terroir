<?php

namespace App\Services;

use App\Models\Animal;
use Illuminate\Support\Facades\Storage;

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
        $this->deleteImage($animal->image);
        $animal->delete();
    }

    public function getAnimal($id)
    {
        return Animal::findOrFail($id);
    }

    public function updateAnimal($id, $data)
    {
        $animal = Animal::findOrFail($id);

        // Handle image upload
        if (isset($data['image_upload'])) {
            $data['image'] = $this->handleImageUpload($data['image_upload'], $animal->name, $animal->image);
        }

        $animal->update($data);
    }

    public function createAnimal($data)
    {
        if (isset($data['image_upload'])) {
            $data['image'] = $this->handleImageUpload($data['image_upload'], $data['name']);
        }

        Animal::create($data);
    }

    public function handleImageUpload($file, $name, $oldImagePath = null)
    {
        // Get file with extension
        $extension = $file->getClientOriginalExtension();

        // Generate a new filename with animal name and current timestamp
        $filename = $name . '_' . time() . '.' . $extension;

        // Save the file in the public storage disk
        $filePath = $file->storeAs('images', $filename, 'public');

        // Delete the old image if it exists
        if ($oldImagePath) {
            $this->deleteImage($oldImagePath);
        }

        return Storage::url($filePath);
    }

    public function deleteImage($imageUrl)
    {
        if ($imageUrl) {
            $imagePath = str_replace('/storage/', '', $imageUrl);
            Storage::disk('public')->delete($imagePath);
        }
    }
}
