<?php

namespace App\Livewire\Companies;

use App\Models\City;
use App\Models\Company;
use Livewire\Component;

class Edit extends Component
{
    public $company;
    public $name;

    public function rules() {
        return [
            'name' => "string|min:3"
        ];
    }

    public function mount(Company $company){
        $this->name = $company->name;

    }

    public function submit() {

        $company = $this->company;

        $this->validate();

        $company->name = $this->name;

        $company->save();


        session()->flash('flash.banner', 'Blog successfully edited');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.companies.edit');
    }
}
