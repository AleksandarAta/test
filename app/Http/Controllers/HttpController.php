<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Object_;

class HttpController extends Controller
{
    public function getApi($symbol){
        return Http::get("https://softwium.com/api/${symbol}")->object();
    }


    public function getName($type) {
        $pokemon = $this->getApi('pokemons');
    
        if($type != 'all'){
            $water = $pokemon->filter(function ($pokemonItem) use ($type) {
                return in_array($type, $pokemonItem['types']);
            })->values();
        }else {
            $water=$pokemon;
        }
        return $water;
    }

    public function chart(){
        $loading = true;
        return view('chart' , compact('loading'));
    }
}
