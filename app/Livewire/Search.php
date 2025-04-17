<?php
namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $focused_search = false;
    public $modal_state = 'hidden';
    public $query = [];

    public function render()
    {   
        if(strlen($this->search) >= 2){
        $this->query = User::where( 'name' , 'LIKE' , '%' . $this->search . '%')->orWhere('email' , 'LIKE' , '%' . $this->search . '%')->get();
        }else{
            $this->query = [];
        }
        if($this->focused_search) {
            $this->modal_state = "show";
        }else {
            $this->modal_state = "hidden";
        }
        return view('livewire.search');
    }
}
