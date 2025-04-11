<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;

        $user->name = 'Admin';
        $user->email = 'admin@user.com';
        $user->email_verified_at = Carbon::now();
        $user->password = bcrypt('admin');


        $user->touch();
        $user->save();

        $user->assignRole('admin');

        $user2 = new User;

        $user2->name = 'editor';
        $user2->email = 'editor@user2.com';
        $user2->email_verified_at = Carbon::now();
        $user2->password = bcrypt('editor');


        $user2->touch();
        $user2->save();

        $user2->assignRole('editor');
    }
}
