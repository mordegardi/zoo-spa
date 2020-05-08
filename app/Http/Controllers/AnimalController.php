<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveAnimalRequest;
use App\Repositories\AnimalRepository;
use App\Animal;
use App\Http\Resources\AnimalResource;

/**
 * Class AnimalController
 */
class AnimalController extends Controller
{
    private $animalRepository;

    public function __construct(AnimalRepository $animalRepository)
    {
        $this->animalRepository = $animalRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AnimalResource::collection($this->animalRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SaveAnimalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAnimalRequest $request)
    {
        return new AnimalResource(
            $this->animalRepository->store($request->all())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return new AnimalResource($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SaveAnimalRequest  $request
     * @param  Animal  $animal Model retrieved by route model binding
     * @return \Illuminate\Http\Response
     */
    public function update(SaveAnimalRequest $request, Animal $animal)
    {
        return new AnimalResource(
            $this->animalRepository->update($animal, $request->all())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Animal  $animal Model retrieved by route model binding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        return $this->animalRepository->delete($animal);
    }
}
