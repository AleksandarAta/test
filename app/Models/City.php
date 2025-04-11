<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
 
    use HasFactory;
    protected $guarded = [];

    public function companies() : BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'cities_companies' ,'city_id','company_id')->withTimestamps();
    }
}
