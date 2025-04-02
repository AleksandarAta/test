<?php

namespace App\Http\Controllers;

use App\Models\DriverLicense;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\DriverLicenseRequest;
use App\Notifications\DriverLicenseDeletedNotification;
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
        return view('driver_licenses.show', ['driverLicense' => $driverLicense]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DriverLicense $driverLicense)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DriverLicense $driverLicense)
    {
        // validated - $request validate ([
        // 'name' => required|string|min:8 ])
        // 'email' => [ 'required'
        // 'email
        // Rule::unique('users')->ignore($user->id)
        // 'password'=> 'required|min:8'],
        
        
        // if($user->password != $request->password) {
        // $user->password = Hash:make($request->password)
        //} 

        // Ako user passowrd ne e ednakov na request password , 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DriverLicense $driverLicense)
    {   
    //    $driver = DriverLicense::with('user')->FindOrFail($driverLicense->user_id);

    //   $driversId = $driver->user->id;

    //   $user = User::findOrFail($driversId);

        // dd($user);
        if($driverLicense->user != null){
        $driverLicense->user->notify(new DriverLicenseDeletedNotification);
        }
            $driverLicense->delete();

            return redirect()->back()->with('message', 'Driver license deleted successfully');

    }
}
