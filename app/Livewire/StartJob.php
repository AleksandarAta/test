<?php

namespace App\Livewire;

use Livewire\Component;
use App\Jobs\ProccessPokemon;

class StartJob extends Component
{
    public function start_job() {
        ProccessPokemon::dispatch();
    }


    public function render()
    {
        return view('livewire.start-job');
    }
}
