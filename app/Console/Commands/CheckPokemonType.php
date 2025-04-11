<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class CheckPokemonType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-pokemon-type {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will list every pokemon with that type';

    /**
     * Execute the console command.
     */
    public function handle()
    {   
        $water = collect();
            $pokemon = Http::get("https://softwium.com/api/pokemons")->collect()->take(15);
            if($this->argument('type') != 'all'){
                $water = $pokemon->filter(function ($pokemonItem) {
                    $type = Str::ucfirst($this->argument('type'));
                    return in_array($type , $pokemonItem['types']);
                })->values();
            }else {
                $water=$pokemon;
            }
           $this->info($water);
        }
    }

