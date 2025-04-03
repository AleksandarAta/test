<?php

namespace App\Livewire;
use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\On;

class Modal extends Component
{
    public $model_to_delete ="";
    public $model_property = 'hidden';
    public $model_id = 'null';  

    #[On('delete_blogs')]
    public function delete_blog($blogId) {
        $this->model_to_delete ="blog";
        $this->model_property = 'display: block';
        $this->model_id = $blogId;
    }

    public function confirm_delete_blog($blogId){

        $blog = Blog::findOrFail($blogId);
        $blog->delete();

        $this->model_to_delete ="";
        $this->model_property = 'hidden';
        $this->model_id = "";

        $this->dispatch('refresh');

    }
    public function hide() {
        $this->model_to_delete ="";
        $this->model_property = 'hidden';
        $this->model_id = "";
    }

    // 
    // #[On('delete-Vehicle')]
    // public function delete_vehicle($vehicleID) {
    //     $vehcicle = Vehicle::findOrFail($vehicleID);
    //         $vehcicle->delete();
    //     }


    public function render()
    {
        
        return view('livewire.modal');
    }
}
