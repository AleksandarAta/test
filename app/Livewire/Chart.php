<?php

namespace App\Livewire;

use App\Models\Peoples;
use App\Models\Pokemon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Livewire\Component;
use Livewire\Attributes\On;

class Chart extends Component
{   
    public $graph;
    public $datasets = array();
    public $value;
    public $loading = true;
    public function pokemon() { 


        $arr = Pokemon::where('created_at', '>=', Carbon::now()->subHour(2))->pluck('name')->toArray();
        $pokemonWeightsAndName = Pokemon::where('created_at', '>=', Carbon::now()->subHour(2))->pluck('weight' , 'name');
        $pokemoHeightandName = Pokemon::where('created_at', '>=', Carbon::now()->subHour(2))->pluck('height', 'name');

        $arr = array_unique($arr);
        

        $namesArr = array_intersect($arr, $pokemonWeightsAndName->keys()->toArray(), $pokemoHeightandName->keys()->toArray());

        $namesColection = collect($namesArr)->values();

        $weight = $pokemonWeightsAndName->only($namesArr)->values()->collect();
        $height = $pokemoHeightandName->only($namesArr)->values()->collect();


        array_push($this->datasets, [
            'label' => 'Pokemon Weight',
            'fill' => true,
            'data' => $weight,
            'borderColor' => 'rgb(250, 30, 40)',
            'backgroundColor' => 'rgb(250, 30, 40, 0.1)',
            'borderWidth' => 2,
        ]); 
        array_push($this->datasets, [
            'label' => 'Pokemon height',
            'fill' => true,
            'data' => $height,
            'borderColor' => 'rgb(144, 238, 144)',
            'backgroundColor' => 'rgb(144, 238, 144 , 2)',
            'borderWidth' => 2,
        ]);


        $this->graph = array('labels' => $namesColection, 'datasets' => $this->datasets);

    }
    public function peoples() {

        $age = array();

        $firstNames = Peoples::where('created_at' , '>=', Carbon::now()->subHour(1))->pluck('firstName');
        $lastName = Peoples::where('created_at' , '>=', Carbon::now()->subHour(1))->pluck('lastName');
        
        foreach($firstNames as $firstName){
            $takeAges = Peoples::where('firstName', $firstName)->pluck('age')->toArray();
            foreach($takeAges as $takeAge){
            array_push($age, $takeAge);
            }
            
        }
            $age = array_unique($age);

        $names = $firstNames->zip($lastName);

        dd($names);

    }
    public function books() {}

    #[On('showChart')]
    public function showChart($value , $loading){
        $this->value = $value;
        $this->loading = $loading;

        if($value == 'pokemons'){
            $this->pokemon();
        }elseif ($value == 'peoples'){
            $this->peoples();
        }elseif($value == 'books'){
            $this->books();
        }

        $this->loading = false;
    }
    public function render()
    {   
        return view('livewire.chart', [
            'graph' => $this->graph,
        ]);

    }
        // #[On('refresh-graph')]
        // public function refreshGraph () {
        //     $this->dispatch('updateGraph');
        // }
}
