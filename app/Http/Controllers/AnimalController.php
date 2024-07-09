<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAnimalRequest;
use App\Http\Requests\StoreAnimalRequest;
use App\Services\AnimalService;
use App\Services\TypeService;
use App\Services\BreedService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\AnimalResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    protected $animalService;
    protected $typeService;
    protected $breedService;

    public function __construct(AnimalService $animalService, TypeService $typeService, BreedService $breedService)
    {
        $this->animalService = $animalService;
        $this->typeService = $typeService;
        $this->breedService = $breedService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['type_id', 'breed_id']);
        $sortBy = $request->input('sortBy', '');
        $sortOrder = $request->input('sortOrder', 'desc');
        $perPage = $request->input('perPage', 9);

        // Get animals with filters
        $animals = $this->animalService->getFilteredAnimals($filters, $sortBy, $sortOrder, $perPage);

        // Get all types and breeds
        $types = $this->typeService->getAllTypes();
        $breeds = $this->breedService->getAllBreeds($filters['type_id'] ?? null);

        return Inertia::render('Welcome', [
            'animals' => AnimalResource::collection($animals),
            'canLogin' => Route::has('login'),
            'filters' => $filters,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'perPage' => $perPage,
            'types' => $types,
            'breeds' => $breeds,
        ]);
    }

    public function adminIndex(Request $request)
    {
        $filters = $request->only(['type_id', 'breed_id']);
        $sortBy = $request->input('sortBy', '');
        $sortOrder = $request->input('sortOrder', 'desc');
        $perPage = $request->input('perPage', 9);

        // Get animals with filters
        $animals = $this->animalService->getFilteredAnimals($filters, $sortBy, $sortOrder, $perPage);

        // Get all types and breeds
        $types = $this->typeService->getAllTypes();
        $breeds = $this->breedService->getAllBreeds($filters['type_id'] ?? null);
        $breedsWithoutFilter = $this->breedService->getAllBreeds(null);

        return Inertia::render('Dashboard', [
            'animals' => AnimalResource::collection($animals),
            'canLogin' => Route::has('login'),
            'filters' => $filters,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'perPage' => $perPage,
            'types' => $types,
            'breeds' => $breeds,
            'breedsWithoutFilter' => $breedsWithoutFilter,
        ]);
    }

    public function switchSoldStatus($id)
    {
        $this->animalService->switchSoldStatus($id);

        return redirect()->back();
    }

    public function destroy($id)
    {
        // delete the image from the storage
        $animal = $this->animalService->getAnimal($id);
        if ($animal->image) {
            // Extract the relative path from the URL
            $imagePath = str_replace('/storage/', '', $animal->image);
            Storage::disk('public')->delete($imagePath);
        }

        $this->animalService->deleteAnimal($id);

        return redirect()->back();
    }

    public function update(EditAnimalRequest $request, $id)
    {
        $data = $request->validated();

        $animal = $this->animalService->getAnimal($id);

        // handle image upload
        if ($request->hasFile('image_upload')) {
            // Get file with extension
            $file = $request->file('image_upload');
            $extension = $file->getClientOriginalExtension();

            // Generate a new filename with animal name and current timestamp
            $filename = $animal->name . '_' . time() . '.' . $extension;

            // Save the file in the public storage disk
            $filePath = $file->storeAs('images', $filename, 'public');

            // Ensure to save the URL of the stored image in the database
            $data['image'] = Storage::url($filePath);

            // Delete the old image if it exists
            if ($animal->image) {
                // Extract the relative path from the URL
                $oldImagePath = str_replace('/storage/', '', $animal->image);
                Storage::disk('public')->delete($oldImagePath);
            }
        }

        $animal->update($data);

        return redirect()->back();
    }

    public function store(StoreAnimalRequest $request)
    {
        $data = $request->validated();

        // handle image upload
        if ($request->hasFile('image_upload')) {
            // Get file with extension
            $file = $request->file('image_upload');
            $extension = $file->getClientOriginalExtension();

            // Generate a new filename with animal name and current timestamp
            $filename = $data['name'] . '_' . time() . '.' . $extension;

            // Save the file in the public storage disk
            $filePath = $file->storeAs('images', $filename, 'public');

            // Ensure to save the URL of the stored image in the database
            $data['image'] = Storage::url($filePath);
        }

        $this->animalService->createAnimal($data);

        return redirect()->back();
    }
}
