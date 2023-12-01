<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Genre;
use App\Models\Author;
use App\Models\InstaBook;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class InstaBookSeeder extends Seeder
{
    public $books = [
        [
            'title' => "Harry Potter and the Philosopher's Stone",
            'author' => ['firstname' => 'J.K.', 'lastname' => 'Rowling'],
            'genre' => 'Fantaisie',
            'year' => 1997,
            'content' => 'The story follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday.',
            'image_path' => 'images\Harry_Potter.jpg'
        ],
        [
            'title' => "1984",
            'author' => ['firstname' => 'George', 'lastname' => 'Orwell'],
            'genre' => 'Dystopique',
            'year' => 1949,
            'content' => '1984 presents a dystopian world in which the government, under the leadership of Big Brother, exercises total control over its citizens.',
            'image_path' => 'images\1984.jpg'
        ],
        [
            'title' => "Pride and Prejudice",
            'author' => ['firstname' => 'Jane', 'lastname' => 'Austen'],
            'genre' => 'Romance',
            'year' => 1813,
            'content' => 'The novel follows the emotional development of the protagonist, Elizabeth Bennet, who learns the error of making hasty judgments.',
            'image_path' => 'images/Pride_and_prejudice.jpg'
        ],
        [
            'title' => "One Hundred Years of Solitude",
            'author' => ['firstname' => 'Gabriel', 'lastname' => 'García Márquez'],
            'genre' => 'Fantastique',
            'year' => 1967,
            'content' => 'The novel tells the multi-generational story of the Buendía family in the fictional town of Macondo, blending fantasy and reality.',
            'image_path' => 'images/1000_Years_of_Solitude.jpg'
        ],
        [
            'title' => "Norwegian Wood",
            'author' => ['firstname' => 'Haruki', 'lastname' => 'Murakami'],
            'genre' => 'Fantastique',
            'year' => 1987,
            'content' => 'The novel explores themes of love, loss, and nostalgia, focusing on the emotional lives of its characters amidst societal changes in 1960s Japan.',
            'image_path' => 'images/Norwegian_Wood.jpg'
        ],
        [
            'title' => "Murder on the Orient Express",
            'author' => ['firstname' => 'Agatha', 'lastname' => 'Christie'],
            'genre' => 'Policier',
            'year' => 1934,
            'content' => 'Detective Hercule Poirot investigates a murder on the luxurious train, using his keen intellect to solve the intricate mystery.',
            'image_path' => 'images/murder-on-the-orient-express.jpg'
        ],
        [
            'title' => "Hamlet",
            'author' => ['firstname' => 'William', 'lastname' => 'Shakespeare'],
            'genre' => 'Tragedie',
            'year' => 1603,
            'content' => 'The play portrays Prince Hamlet of Denmark\'s revenge against his uncle, who has murdered Hamlet\'s father to seize the throne.',
            'image_path' => 'images/Hamlet.jpg'
        ],
        [
            'title' => "The Lord of the Rings",
            'author' => ['firstname' => 'J.R.R.', 'lastname' => 'Tolkien'],
            'genre' => 'Fantaisie',
            'year' => 1954,
            'content' => 'The epic fantasy novel follows the journey of a hobbit named Frodo Baggins to destroy a powerful ring and defeat the Dark Lord Sauron.',
            'image_path' => 'images/LOTR.jpg'
        ],
        [
            'title' => "Beloved",
            'author' => ['firstname' => 'Toni', 'lastname' => 'Morrison'],
            'genre' => 'Horreur',
            'year' => 1987,
            'content' => 'Sethe, an escaped enslaved woman, is haunted by the memory of her deceased daughter in this powerful exploration of slavery\'s impact on families.',
            'image_path' => 'images/Beloved.jpg'
        ],
        [
            'title' => "War and Peace",
            'author' => ['firstname' => 'Leo', 'lastname' => 'Tolstoy'],
            'genre' => 'Historique',
            'year' => 1869,
            'content' => 'The novel tells the story of several Russian aristocratic families during the Napoleonic Wars, reflecting on the human experience.',
            'image_path' => 'images/war_and_peace.jpg'
        ],
    ];

    public $users = [
        1 => 'Kihn Franz',
        2 => 'Jast Victoria',
        3 => "O'Keefe Caleigh",
        4 => 'Haley Kristy',
        5 => 'Kerluke Natasha',
        6 => 'Kuhn Kristina',
        7 => 'Conroy Brandy',
        8 => 'White Melyna',
        9 => 'Swaniawski Emilia',
        10 => 'Robel Juston',
    ];


    public function run(): void
    {
        foreach ($this->books as $book) {

            $author = Author::firstOrCreate([
                'firstname' => $book['author']['firstname'],
                'lastname' => $book['author']['lastname'],
            ]);

            $genre = Genre::firstOrCreate(['genre' => $book['genre']]);

            $user_id = rand(1, 10);
            $rate_id = rand(1, 10);

            InstaBook::create([
                'title' => $book['title'],
                'author_id' => $author->id,
                'genre_id' => $genre->id,
                'year' => $book['year'],
                'content' => $book['content'],
                'user_id' => $user_id,
                // 'rate_id' => $rate_id,
            ]);
        }
    }
}
