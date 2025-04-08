<?php

namespace App\Jobs;

use App\Models\Pokemon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProccessPokemon implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pokemons = Http::get("https://softwium.com/api/pokemons")->object();


        $chunks = Arr::random($pokemons, 3);


        foreach ($chunks as $chunk) {

            // return;

            Pokemon::create([
                'name'=> $chunk->name,
                'weight' => $chunk->weight,
                'height' => $chunk->height,
                'type'=> json_encode($chunk->types),
                'familiy' => $chunk->family
            ]);
        }
    }
}

