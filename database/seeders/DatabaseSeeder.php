<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\City;
use App\Models\User;
use App\Models\Company;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vehicle;
use App\Models\DriverLicense;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->unverified()->has(DriverLicense::factory(1))
            ->has(Vehicle::Factory(1))
            ->create();
        User::factory(10)->create();
        Vehicle::factory(100)->create();

        DriverLicense::factory(10)->create();
        User::factory()->has(DriverLicense::factory(1))->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        for ($i = 0; $i <= 50; $i++) {
            User::factory(1)->has(Vehicle::Factory(rand(1, 3)))->create();
        };
        User::factory()->unverified()->has(DriverLicense::factory(1))->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
        ]);
        Blog::factory(100)->create();

        $this->call([
            RolesAndPermissionsSeeder::class,
            AdminSeeder::class,
        ]);
        
        City::factory(100)->create();
        Company::factory(100)->create();

        $cities = City::all();
        $companies = Company::all();

        City::all()->each(function($city) use ($companies){
            $city->companies()->attach(
               $companies->random(rand(1,4))->pluck('id')->toArray()
            );
        });
        Company::all()->each(function($Company) use ($cities){
            $Company->cities()->attach(
               $cities->random(rand(1,4))->pluck('id')->toArray()
            );
        });


    }
}
