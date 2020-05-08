<?php

namespace App\Repositories;

use App\Animal;

/**
 * Class AnimalRepository
 */
class AnimalRepository
{
    /**
     * Get all animals
     * 
     * @return Collection
     */
    public function all()
    {
        return Animal::all();
    }

    /**
     * Store an animal
     * 
     * @param array $data Animal to store
     * @return Animal
     */
    public function store(array $data) : Animal
    {
        $model = new Animal();
        $model->fill($data);
        // if we need to do anything else here...
        $model->save();

        return $model;
    }

    /**
     * Update an animal
     * 
     * @param Animal $animal Animal to update
     * @param array $data
     * @return Animal
     */
    public function update(Animal $model, array $data) : Animal
    {
        $model->fill($data);
        // if we need to do anything else here...
        $model->save();

        return $model;
    }

    /**
     * Delete an animal
     * 
     * @param Animal $animal Animal to delete
     * @return bool|null
     */
    public function delete(Animal $model) : ?bool
    {
        return $model->delete();
    }
}
