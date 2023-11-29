<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;

use App\Models\InstaBook;
use Illuminate\Http\Request;

class InstaBookController extends Controller
{
    public function index()
    {
        $instabook = InstaBook::All();
        return view('instabook.index', compact('instabook'));
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('instabook.create', compact("authors", "genres"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required',
            'title' => 'required',
            'author' => 'required|exists:authors,id',
            'genre' => 'required|exists:genres,id',
            'year' => 'required',
            'content' => 'required',
            'image_path' => 'required'
        ]);
    
        // Récupérer l'auteur et le genre par leur ID
        $authorId = $request->input('author');
        $genreId = $request->input('genre');
    
        // Enregistrer les données dans la table InstaBook avec les clés étrangères
        InstaBook::create([
            "user_id" => $request->user_id,
            "title" => $request->title,
            "author_id" => $authorId,
            "genre_id" => $genreId,
            "year" => $request->year,
            "content" => $request->content,
            "image_path" =>$request->image_path
        ]);
    
        // Rediriger vers une page appropriée après l'enregistrement, par exemple, la page de détails du livre
        return redirect()->route('instabook.show', ['id' => $id]);

    }
    public function show(InstaBook $instabook)
    {
        // Récupérer tous les InstaBooks depuis la base de données
        $allInstaBooks = InstaBook::all();
    
        return view('instabook.show')->with([
            'instabooks' => $allInstaBooks,
            'instabook' => $instabook,
        ]);
    }

  
  
    public function edit(InstaBook $instabook)
    {
        $authors = Author::All();
        $genres = Genre::All();
        return view('instabook.create',compact("authors", "genres"));

    }
 
    public function update(Request $request, InstaBook $instabook)
    {
        $request->validate([
            'user_id'=> 'required',
            'title' => 'required',
            'author_id' => 'required',
            'genre_id' => 'required',
            'year' => 'required',
            'content' => 'required',
            'image_path' => 'required'
        
        ]);
        $instabook->user_id = $request->user_id;
        $instabook->title = ucwords(strtolower($request->title));
        $instabook->author_id = $request->author_id;
        $instabook->genre_id = $request->genre_id;
        $instabook->year = $request->year;
        $instabook->content = $request->content;
        $instabook->image_path = $request->image_path;

        $instabook->save();

        // return redirect(route('pokemon.index'));
        return redirect(route('instabook.show', compact('instabook')));
    }


    public function search(Request $request){

        $search = $request->input('rechercher');
    
        $instabook = InstaBook::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->get();
    
        return view('instabook.index', compact('instabook'));
    }

    
    // public function destroy(string $id){

    //         $title = ucfirst(strtolower($id));
    //     if (array_key_exists($title, $this ->instabook)) {

    //     unset ($this->instabook[$title]);

    //     return view('instabook.index')-> with([
    //         'instabook' => $this->instabook,
    //         'message'=> "Le livre $title a été supprimé"
    //     ]);
    //     }
    //     return view('instabook.index')-> with([
    //         'instabook' => $this->instabook,
    //         'message'=> "Le livre $title n'existe pas"
    //     ]);

    // }
}
