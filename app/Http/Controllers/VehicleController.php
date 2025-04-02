<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return view('vehicles.index');
    }
    public function create()
    {
        return view('vehicles.create');
    }
    public function edit($vehicle_id)
    {
        $vehicle = Vehicle::findOrFail($vehicle_id);

        return view('vehicles.edit', ['vehicle' => $vehicle]);
    }
}
