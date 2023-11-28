<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public $authors = [
        ['firstname' => 'J.K.', 'lastname' => 'Rowling'],
        ['firstname' => 'George', 'lastname' => 'Orwell'],
        ['firstname' => 'Jane', 'lastname' => 'Austen'],
        ['firstname' => 'Gabriel', 'lastname' => 'García Márquez'],
        ['firstname' => 'Haruki', 'lastname' => 'Murakami'],
        ['firstname' => 'Agatha', 'lastname' => 'Christie'],
        ['firstname' => 'William', 'lastname' => 'Shakespeare'],
        ['firstname' => 'J.R.R.', 'lastname' => 'Tolkien'],
        ['firstname' => 'Toni', 'lastname' => 'Morrison'],
        ['firstname' => 'Leo', 'lastname' => 'Tolstoy'],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        foreach($this->authors as $author){
            Author::factory()->create([
                'firstname' => $author['firstname'],
                'lastname' => $author['lastname'],
            ]);
        }
    }
}
