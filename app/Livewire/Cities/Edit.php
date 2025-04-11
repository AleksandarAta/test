<?php

namespace App\Livewire\Cities;

use App\Models\City;
use Livewire\Component;

class Edit extends Component
{
    public $city;
    public $name;

    public function rules() {
        return [
            'name' => "string|min:3"
        ];
    }

    public function mount(City $city){
        $this->name = $city->name;

    }

    public function submit() {

        $city = $this->city;

        $this->validate();

        $city->name = $this->name;

        $city->save();


        session()->flash('flash.banner', 'Blog successfully edited');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('cities.index');
    }

    public function render()
    {
        return view('livewire.cities.edit');
    }
}
