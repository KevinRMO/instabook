<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Rate;
use App\Models\InstaBook;
use Illuminate\Http\Request;

class InstaBookController extends Controller
{
    public function index()
    {
        $instabooks = InstaBook::select('insta_books.*', 'genres.genre')
        ->join('genres', 'genre_id', '=', 'genres.id')
        ->get();
        return view('instabook.index', compact('instabooks'));
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
            'user_id' => 'required',
            'title' => 'required',
            'author' => 'required|exists:authors,id',
            'genre' => 'required|exists:genres,id',
            'year' => 'required|numeric',
            'content' => 'required',
            'image_path' => 'required'
            
        ]);

        $authorId = $request->input('author');
        $genreId = $request->input('genre');

        $image = $request->file('image_path');
        $originalName = $image->getClientOriginalName();
        $extension =$image->getClientOriginalExtension();
        $imageName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;
        $image_path = $image->storeAs( 'images', $imageName,'public' );
        $request->image_path->move(public_path('images'), $imageName);

        // Utiliser l'authentification pour obtenir l'utilisateur connecté et créer un livre associé à cet utilisateur
        $user = auth()->user();

        // Créer un livre associé à l'utilisateur connecté
       
        $instabook = $user->instabooks()->create([
            'user_id' => $user->id, 
            'title' => $request->title,
            'author_id' => $authorId,
            'genre_id' => $genreId,
            'year' => $request->year,
            'content' => $request->content,
            'image_path' => $image_path,
        ]);

        // Redirection vers la page de détails du livre nouvellement créé
        return redirect()->route('instabook.show', ['instabook' => $instabook->id]);

    }

        public function storeRate(Request $request, InstaBook $instabook)
    {
        $request->validate([
            'rate' => 'required|numeric|min:0|max:5',
        ]);
        
        $rate = Rate::create([
            'rate'=> $request->rate,
            'insta_book_id'=> $instabook->id,
            'user_id' => auth()->id(), // Utilisation de l'ID de l'utilisateur authentifié
        ]);

        return redirect()->route('instabook.show', ['instabook' => $instabook->id])
            ->with('success', 'Note enregistrée avec succès !');
    }

    public function show(InstaBook $instabook)
    {
        $instaBooks = InstaBook::all();
        $user = auth()->user();
        $rated = $instabook->ratings()->where('user_id', $user->id)->first(); // Vérifie si l'utilisateur a déjà noté ce livre
    
        return view('instabook.show')->with([
            'instabook' => $instabook,
            'rated' => $rated,
        ]);
    }

    public function edit( InstaBook $instabook)
    {
        // $instabook = Instabook::findOrFail($id);
        $authors = Author::All();
        $genres = Genre::All();
        return view('instabook.edit',compact("authors", "genres", "instabook"));

    }
 
    public function update(Request $request, InstaBook $instabook)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'genre_id' => 'required',
            'year' => 'required',
            'content' => 'required',
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $originalName = $image->getClientOriginalName();
            $extension =$image->getClientOriginalExtension();
            $imageName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;
            $image_path = $image->storeAs('images', $imageName, 'public');
            $request->image_path->move(public_path('images'), $imageName);
        } else {
            $image_path = $instabook->image_path;
        }
    
        $instabook->update([
            'title' => ucwords(strtolower($request->title)),
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'year' => $request->year,
            'content' => $request->content,
            'image_path' => $image_path,
        ]);
    
        return redirect(route('instabook.show', compact('instabook')));
    }



    public function search(Request $request)
    {

        $search = $request->input('rechercher');
        
        $instabooks = InstaBook::select('insta_books.*', 'authors.id as author_id', 'genres.id as genre_id', 'genres.genre')
        ->join('authors', 'author_id', '=', 'authors.id')
        ->join('genres', 'genre_id', '=', 'genres.id')
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('lastname', 'LIKE', "%{$search}%")
        ->orWhere('firstname', 'LIKE', "%{$search}%")
        ->orWhere('genre', 'LIKE', "%{$search}%")
        ->get();
    
        return view('instabook.index', compact('instabooks'));
    }

        public function destroy($id)
    {
        // Trouver le livre à supprimer
        $instabook = InstaBook::findOrFail($id);

        // Supprimer le livre
        $instabook->delete();

        // Redirection après la suppression
        return redirect()->route('instabook.index');
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
