<?php

namespace App\Http\Controllers;

use App\Models\DriverLicense;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\DriverLicenseRequest;
use Carbon\Carbon;

class DriverLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $driverLicenses = DriverLicense::with('user')->get();

       return view("driver_licenses.index", ["driver_licenses" => $driverLicenses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $driverLicense = DriverLicense::with('user')->whereNull('user_id')->get();

        $users = User::doesntHave('driverLicense')->get();
        
        return view('driver_licenses.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverLicenseRequest $request)
    {
        $validatedData = $request->validated();

        DriverLicense::create([
            'user_id' => $request->selected_user,
            'date' => Carbon::createFromDate($request->date),
            'date_till' => Carbon::createFromDate($request->date)->addYears(10),
        ]);

        return redirect()->route('driver_licenses.index')->with('message', 'Driver license created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(DriverLicense $driverLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DriverLicense $driverLicense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DriverLicense $driverLicense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DriverLicense $driverLicense)
    {
        //
    }
}
