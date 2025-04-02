<?php

namespace App\Livewire\Vehicles;

use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;

class Edit extends Component
{
    public $owner;
    public $brand;
    public $model;
    public $vin;
    public $fuel;
    public $registration;
    public $vehicle;

    protected function rules()
    {
        return [
            'owner' => 'required|integer',
            'brand' => 'required|string',
            'model' => 'required|string',
            'registration' => 'required|string',
            'vin' => 'required|string',
            'fuel' => 'required|string',

        ];
    }

    public function mount($vehicle)
    {
        $this->owner = $vehicle->user_id;
        $this->brand = $vehicle->brand;
        $this->model = $vehicle->model;
        $this->registration = $vehicle->registration;
        $this->vin = $vehicle->vin;
        $this->fuel = $vehicle->fuel;
        $this->vehicle = $vehicle;
    }

    public function submit()
    {
        $this->validate();

        $this->vehicle->update([
            'user_id' => $this->owner,
            'brand' => $this->brand,
            'model' => $this->model,
            'registration' => $this->registration,
            'vin' => $this->vin,
            'fuel' => $this->fuel,
        ]);

        session()->flash('flash.banner', 'Vehicle created succsessfully');
        session()->flash('flash.bannerStyle', 'success');

        $this->vehicle->save();

        return redirect()->route('vehicles.index');
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.vehicles.edit', ['users' => $users]);
    }
}
