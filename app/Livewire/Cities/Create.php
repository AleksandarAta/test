<?php

namespace App\Livewire\Cities;

use App\Models\City;
use App\Models\Company;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public $selected_city;
    public $name;
    public $selected_companies;
    public $i = '';
    public $loading = false;

    #[On('newCity')]
    public function newCity() {
        $this->i = 'newCity';
         $this->loading = true;

    }
    #[On('addCompanies')]
    public function addCompanies() {
        $this->i = 'addCompanies';
        $this->loading = true;

    }



    public function rules()
    {
        $selected_city = $this->selected_city;



        switch($this->i){
            case('addCompanies'):
                return [
                  'selected_city' => 'required',
                  'selected_companies' => [
                    'required',
                    Rule::unique('cities_companies' , 'company_id')->where(
                        function($query) use ($selected_city){
                            return $query->where('city_id', $selected_city);
                        }
                    )
                    ], 
                ];
                case('newCity'):
                return [
                    'name' => 'string|min:3'
                ];
        }

       
    }

    public function submit()
    {   
        switch($this->i){
            case('addCompanies'):

                $this->validate();


                        $city = City::find($this->selected_city)->companies()->attach($this->selected_companies);
            

                    session()->flash('flash.banner', 'City successfully added');
                    session()->flash('flash.bannerStyle', 'success');
                    return redirect()->route('cities.index');
            
            case('newCity'):
                $this->validate();
                
                $city = City::create([
                    'name' => $this->name,
                ]);
        
                $city->companies()->attach($this->selected_companies);
        
                session()->flash('flash.banner', 'City successfully added');
                session()->flash('flash.bannerStyle', 'success');
                return redirect()->route('cities.index');
            }

        
    }

    public function render()
    {

        $companies = Company::all();
        $city = City::all();


        return view('livewire.cities.create', [
            'companies' => $companies,
            'cities' => $city,
        ]);
    }
}
