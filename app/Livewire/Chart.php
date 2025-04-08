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
            'fill' => true,
            'data' => $weight,
            'borderColor' => 'rgb(250, 30, 40)',
            'backgroundColor' => 'rgb(250, 30, 40, 0.1)',
            'borderWidth' => 2,
        ]); 
        array_push($datasets, [
            'label' => 'Pokemon height',
            'fill' => true,
            'data' => $height,
            'borderColor' => 'rgb(144, 238, 144)',
            'backgroundColor' => 'rgb(144, 238, 144 , 2)',
            'borderWidth' => 2,
        ]);

        $graph = array('labels' => $namesColection, 'datasets' => $datasets);

        return view('livewire.chart', [
            'graph' => json_encode($graph),
        ]);
    }
}
