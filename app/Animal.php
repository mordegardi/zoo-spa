<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Animal
 * 
 * @property string $name
 * @property string $species
 * @property string $nickname
 * @property string $image
 */
class Animal extends Model
{
    /**
     * Table of the model
     * 
     * @var string $table
     */
    protected $table = 'animals';

    /**
     * Attributes that are mass assignable
     * 
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'species_id',
        'nickname',
        'image',
    ];

    /**
     * Species relationship
     * 
     * @return HasOne
     */
    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id');
    }
}
