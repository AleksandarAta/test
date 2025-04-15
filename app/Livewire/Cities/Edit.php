<?php

namespace App\Livewire\Cities;

use App\Models\City;
use App\Models\Company;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $city;
    public $name;
    public $attached_companies;
    public function rules() {
        return [
            'name' => 'required|string',
        ];
    }

    public function mount(City $city){
        $this->city = $city;
        $this->name = $city->name;
        $this->attached_companies = $city->companies()->pluck('company_id')->toArray();
    }

    public function submit() {

        $city = $this->city;

        $city->name = $this->name;
       $synced =  City::find($city->id)->companies()->sync($this->attached_companies);

        $this->validate();
        $city->save();

        session()->flash('flash.banner', 'Blog successfully edited');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('cities.index');
    }

    public function render()
    {
        $companies = Company::all();


        return view('livewire.cities.edit', [
         'companies' => $companies,
    ]);
    }
}
