<?php

namespace App\Livewire\Vehicles;

use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{
   use WithFileUploads;
   
    public $user;
    public $brand;
    public $model;
    public $vin;
    public $fuel;
    public $image;
    public $imageUrl;
    public $registration;


    protected function rules()
    {
        return [
            'user' => 'required|integer',
            'brand' => 'required|string',
            'model' => 'required|string',
            'registration' => 'required|string',
            'vin' => 'required|string',
            'fuel' => 'required|string',
        ];
    }

    public function submit()
    {
        if ($this->image != null) {
            $image_extension = $this->image->getClientOriginalExtension();
            $image_url = $this->image->storeAs('images', $this->model . '-image.' . $image_extension);
            $image_url = url($image_url);
        } else {
            $image_url = null;
        }


        $this->validate();

        $newVehicle =  Vehicle::create([
            'user_id' => $this->user,
            'brand' => $this->brand,
            'model' => $this->model,
            'registration' => $this->registration,
            'vin' => $this->vin,
            'fuel' => $this->fuel,
            'image' => $image_url,
        ]);

        session()->flash('flash.banner', 'vehicle create succsessfully');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('vehicles.index');
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.vehicles.create', ['users' => $users]);
    }
}
