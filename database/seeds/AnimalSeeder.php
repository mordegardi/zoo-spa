<?php

use Illuminate\Database\Seeder;

/**
 * Class AnimalSeeder
 */
class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Animal::class, 20)->create();
    }
}
