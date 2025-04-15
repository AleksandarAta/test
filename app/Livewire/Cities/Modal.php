<?php

namespace App\Livewire\Cities;

use Livewire\Component;
use Livewire\Attributes\On;

class Modal extends Component
{
    public $modal_state = 'show'; 
    public $modal_value = '';

    public function newCity() {
        $this->modal_state = 'hidden';
        $this->modal_value = 'newCity'; 
        $this->dispatch('newCity');
        $this->dispatch('inItTomSelect');
    }
    
    public function addCompanies() {
        $this->modal_state = 'hidden';
        $this->modal_value = 'addCompanies';
        $this->dispatch('addCompanies');
        $this->dispatch('inItTomSelect');

    }

    public function render()
    {
        return view('livewire.cities.modal');
    }
}
