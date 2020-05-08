<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Species
 */
class Species extends Model
{
    /**
     * Table of the model
     * 
     * @var string $table
     */
    protected $table = 'species';

    /**
     * Attributes that are mass assignable
     * 
     * @var array $fillable
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Animals relationship
     * 
     * @return HasMany
     */
    public function animals()
    {
        return $this->hasMany(\App\Animal::class, 'species_id');
    }
}
