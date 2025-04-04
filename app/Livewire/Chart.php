<?php

namespace App\Livewire;

use App\Models\Pokemon;
use Livewire\Component;

class Chart extends Component
{
    public function render()
    {
        $pokemon = Pokemon::where('weight', 'created_at')->get();

        $pokemon_weight = $pokemon->pluck('weight');
        $pokemon_summoned = $pokemon->pluck('created_at');

         
        

        return view('livewire.chart', [
            'pokemon_weight' => $pokemon_weight,
            'pokemon_summoned' => $pokemon_summoned,
        ]);
    }
}
