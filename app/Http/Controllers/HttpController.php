<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpController extends Controller
{
    public function getApi($symbol){
        return Http::get("https://softwium.com/api/${symbol}")->collect();
    }

    public function getName($symbol) {
        $pokemon = $this->getApi($symbol)->collect()->take(10);
        $values = collect();
        $types = $pokemon->pluck('types')->collect();
        // foreach($types as $type) {
        //     foreach ($type as $value) {
        //         $values->push($value);
        //     }
        // }
            dd($types);
        $watertype = $pokemon->where(function ($types){
                 $types->contains('Water');
        })->collect();

        $water = collect();

        foreach ($watertype as $watertype) {

            $water->push($watertype);
            
            sleep(1); 
        }
        

        return $water;
    }
}
