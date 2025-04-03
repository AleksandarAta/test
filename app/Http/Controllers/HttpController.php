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
        $pokemon = $this->getApi($symbol)->collect();


        $watertype = $pokemon->where('weight', 4)->collect();

        $water = collect();

        foreach ($watertype as $watertype) {

            $water->push($watertype);
            
            sleep(1); 
        }
        

        return $water;
    }
}
