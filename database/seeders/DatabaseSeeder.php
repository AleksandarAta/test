<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    }
}
