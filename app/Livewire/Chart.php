<?php

namespace App\Livewire;

use App\Models\Peoples;
use App\Models\Pokemon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Livewire\Component;
use Livewire\Attributes\On;

use function Laravel\Prompts\alert;

class Chart extends Component
{   
    public $graph;
    public $datasets = array();
    public $value;
    public $loading = true;
    public function pokemon() { 


        $arr = Pokemon::where('created_at', '>=', Carbon::now()->subHour(1))->pluck('name')->toArray();
        $pokemonWeightsAndName = Pokemon::where('created_at', '>=', Carbon::now()->subHour(1))->pluck('weight' , 'name');
        $pokemoHeightandName = Pokemon::where('created_at', '>=', Carbon::now()->subHour(1))->pluck('height', 'name');

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
            'lineTension' => 0.3,
            'pointStyle' => false
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

        // dd($this->graph);

    }
    public function peoples() {

        $age = collect();

        $firstNames = Peoples::where('created_at' , '>=', Carbon::now()->subHour(1))->pluck('firstName');
        $lastName = Peoples::where('created_at' , '>=', Carbon::now()->subHour(1))->pluck('lastName');
           
            

        foreach($firstNames as $firstName){

            $takeAges = Peoples::where('firstName', $firstName)->pluck('age')->first();
            $age->push($takeAges);
 
            
        }
            // $age = $age->values();         


        $names = $firstNames->zip($lastName);


        // dd($names);


        array_push($this->datasets, [
            'label' => 'Age',
            'fill' => true,
            'data' => $age,
            'borderColor' => 'rgb(187, 238, 100)',
            'backgroundColor' => 'rgb(187, 238, 100, 0.2)',
            'borderWidth' => 2,
            'lineTension' => 1,
            'pointStyle' => false

        ]);



        $this->graph = array('labels' => $names , 'datasets' => $this->datasets);

    }
    public function books() {}

    #[On('showChart')]
    public function showChart($value){
        $this->value = $value;

        if($value == 'pokemons'){
            $this->datasets = array();
            $this->graph = null;
            $this->pokemon();
        $this->loading = false;

        }elseif ($value == 'peoples'){
            $this->graph = null;
            $this->datasets = array();
            $this->loading = false;

            $this->peoples();
        }elseif($value == 'books'){
            $this->graph = null;
            $this->datasets = array();
            $this->books();
        $this->loading = false;

        }else {
            alert('Please select a option');
        }

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
