<?php

namespace App\Livewire\Cities;

use App\Models\City;
use App\Models\Company;
use Livewire\Component;

class Index extends Component
{



    public function render()
    {

        $cities = City::with('companies')->get();

        return view('livewire.cities.index' , [ 
            'cities' => $cities
        ]);


    }
}
