<?php

namespace App\Console\Commands;

use App\Models\Books;
use Illuminate\Support\Arr;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PopulateBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-books';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill books db';

    /**
     * Execute the console command.
     */
    public function handle()
    {
              $book = Http::get('https://softwium.com/api/books')->object();


        $chunks = Arr::random($book, 5);
        foreach ($chunks as $chunk){
        Books::create([
            'authors' => json_encode($chunk->authors),
            'isbn' => $chunk->isbn,
            'pageCount' => $chunk->pageCount,
            'title' => $chunk->title,
        ]);
    }
}
}
