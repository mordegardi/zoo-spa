<?php

use Illuminate\Database\Seeder;

/**
 * Class SpeciesSeeder
 */
class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exampleSpecies = [
            'wolf',
            'cat',
            'lion',
            'tiger',
            'bear',
            'panda',
            'horse',
            'dog',
            'human',
            'fox',
            'rabbit',
            'rat',
            'cougar',
            'human',
        ];

        foreach ($exampleSpecies as $species) {
            \App\Species::updateOrCreate([
                'name' => $species
            ]);
        }
    }
}
