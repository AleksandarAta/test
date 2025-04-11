<?php

namespace App\Livewire\Cities;

use App\Models\City;
use App\Models\Company;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $companies;


    public function mount() {
        $this->companies = Company::all();
    }


    public function rules() {
        return [
            'name' => 'string|min:3'
        ];
    }

    public function submit() {
        $this->validate();

       $city = City::create([
                'name' => $this->name,
        ]);

        $city->companies()->attach($this->companies);
    

                
        session()->flash('flash.banner', 'City successfully added');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('cities.index');
    }   

    public function render()
    {

        // dd($companies);

        return view('livewire.cities.create');
    }
}
