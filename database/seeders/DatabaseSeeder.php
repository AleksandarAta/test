<?php

namespace Database\Seeders;

use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Blog::factory(100)->create();
        User::factory(10)->create();
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

            // $this->call([
            //     RolesAndPermissionsSeeder::class,
            //     AdminSeeder::class,
            // ]);
        }

       
    }
