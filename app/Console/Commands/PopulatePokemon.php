<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use Illuminate\Support\Arr;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class PopulatePokemon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-pokemon';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'puplite the pokemon migartion based on api';

    /**
     * Execute the console command.
     */
    public function handle()
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
        $this->info('pupulated database');
    }

}
