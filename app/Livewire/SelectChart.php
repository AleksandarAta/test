<?php

namespace App\Livewire;

use Livewire\Component;

class SelectChart extends Component
{
    public $value;
    public $loading;

    public function mount($loading) {
        $this->loading = $loading;
    }

    public function submit() {
        $this->dispatch('showChart', value:$this->value , loading:$this->loading);
        $this->dispatch('rerender');
    }




    public function render()
    {   
        return view('livewire.select-chart');
    }
}
