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
        return $this->renderAnimalPage($request, 'Welcome');
    }

    public function adminIndex(Request $request)
    {
        return $this->renderAnimalPage($request, 'Dashboard', true);
    }

    /**
     * Render welcome page with filters
     *
     * @param Request $request
     * @param string $view
     * @param bool $includeAllBreeds
     * @return \Inertia\Response
     */
    private function renderAnimalPage(Request $request, string $view, bool $includeAllBreeds = false)
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

        $data = [
            'animals' => AnimalResource::collection($animals),
            'canLogin' => Route::has('login'),
            'filters' => $filters,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'perPage' => $perPage,
            'types' => $types,
            'breeds' => $breeds,
        ];

        if ($includeAllBreeds) {
            $data['breedsWithoutFilter'] = $this->breedService->getAllBreeds(null);
        }

        return Inertia::render($view, $data);
    }

    public function switchSoldStatus($id)
    {
        $this->animalService->switchSoldStatus($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->animalService->deleteAnimal($id);
        return redirect()->back();
    }

    public function update(EditAnimalRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image_upload')) {
            $data['image_upload'] = $request->file('image_upload');
        }

        $this->animalService->updateAnimal($id, $data);
        return redirect()->back();
    }

    public function store(StoreAnimalRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image_upload')) {
            $data['image_upload'] = $request->file('image_upload');
        }

        $this->animalService->createAnimal($data);
        return redirect()->back();
    }
}
