<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DriverLicense;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->unverified()->has(DriverLicense::factory(1))->create();
        User::factory(10)->create();
        DriverLicense::factory(10)->create();

        User::factory()->has(DriverLicense::factory(1))->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->unverified()->has(DriverLicense::factory(1))->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
        ]);
    }
}
