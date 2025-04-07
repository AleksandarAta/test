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


        $pokemon_weight = Pokemon::where('created_at', '>=', Carbon::now()->subDay())->pluck('weight');
        $pokemon_height = Pokemon::where('created_at', '>=', Carbon::now()->subDay())->pluck('height');
        $pokemon = Pokemon::whereIn('weight', $pokemon_weight)->pluck('name');
        array_push($datasets, [
            'label' => 'Pokemon Weight',
            'fill' => false,
            'data' => $pokemon_weight,
            'borderColor' => 'rgb(250, 30, 40)',
            'boderWidth' => 2,
        ]); 
        array_push($datasets, [
            'label' => 'Pokemon height',
            'fill' => false,
            'data' => $pokemon_height,
            'borderColor' => 'rgb(255, 30, 120)',
            'boderWidth' => 2,
        ]);
        // dd($pokemon);

        $graph = array('labels' => $pokemon, 'datasets' => $datasets);

        return view('livewire.chart', [
            'graph' => json_encode($graph),
        ]);
    }
}
