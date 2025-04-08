<?php

namespace App\Livewire;

use App\Models\Pokemon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Livewire\Component;

class Chart extends Component
{



    public function render()
    {

        $datasets= array();

        $arr = Pokemon::where('created_at', '>=', Carbon::now()->yesterday())->pluck('name')->toArray();
        $pokemonWeightsAndName = Pokemon::where('created_at', '>=', Carbon::now()->yesterday())->pluck('weight' , 'name');
        $pokemoHeightandName = Pokemon::where('created_at', '>=', Carbon::now()->yesterday())->pluck('height', 'name');

        $arr = array_unique($arr);
        

        $namesArr = array_intersect($arr, $pokemonWeightsAndName->keys()->toArray(), $pokemoHeightandName->keys()->toArray());

        $namesColection = collect($namesArr)->values();

        $weight = $pokemonWeightsAndName->only($namesArr)->values()->collect();
        $height = $pokemoHeightandName->only($namesArr)->values()->collect();


        array_push($datasets, [
            'label' => 'Pokemon Weight',
            'fill' => false,
            'data' => $weight,
            'borderColor' => 'rgb(250, 30, 40)',
            'borderWidth' => 2,
        ]); 
        array_push($datasets, [
            'label' => 'Pokemon height',
            'fill' => false,
            'data' => $height,
            'borderColor' => 'rgb(144, 238, 144)',
            'borderWidth' => 2,
        ]);

        $graph = array('labels' => $namesColection, 'datasets' => $datasets);

        return view('livewire.chart', [
            'graph' => json_encode($graph),
        ]);
    }
}
