<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{

    private $liste = ['Policier', 'Manga', 'Horreur', 'Fantaisie', 'Fantastique' , 'Biographie', 'Poésie', 'Conte'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->liste as $genre) {
            Genre::factory()->create(['genre'=>$genre]);
        }
    }
}
