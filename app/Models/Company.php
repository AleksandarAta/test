<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;


    public function cities() : BelongsToMany
    {
        return $this->belongsToMany(City::class, 'cities_companies' , 'company_id' ,'city_id');
    }
}
