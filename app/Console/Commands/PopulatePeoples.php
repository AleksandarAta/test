<?php

namespace App\Console\Commands;

use App\Models\Peoples;
use Illuminate\Support\Arr;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PopulatePeoples extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-peoples';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill peoples db';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $people = Http::get('https://softwium.com/api/peoples')->object();

        // dd($people);

        $chunks = Arr::random($people, 5);
        foreach ($chunks as $chunk){
        Peoples::create([
            'firstName' => $chunk->firstName,
            'lastName' => $chunk->lastName,
            'age' => $chunk->age,
        ]);
     }
    }
}
