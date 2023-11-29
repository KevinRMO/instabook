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
        'title' => 'required',
        'author' => 'required|exists:authors,lastname',
        'genre' => 'required|exists:genres,genre',
        'year' => 'required',
        'content' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $authorId = $request->input('author');
    $genreId = $request->input('genre');

    $image_path = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image_path = $image->storeAs('images', $imageName, 'public');
    }

    InstaBook::create([
        "title" => $request->title,
        "author" => $authorId,
        "genre" => $genreId,
        "year" => $request->year,
        "content" => $request->content,
        "image_path" => $image_path,
    ]);

    return redirect()->route('instabook.create');
}

    public function show(InstaBook $instabook)
    {
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
            'title' => 'required',
            'author_id' => 'required',
            'genre_id' => 'required',
            'year' => 'required',
            'content' => 'required',
            'image_path' => 'required'
        
        ]);

        $instabook->title = ucwords(strtolower($request->title));
        $instabook->author_id = $request->author_id;
        $instabook->genre_id = $request->genre_id;
        $instabook->year = $request->year;
        $instabook->content = $request->content;
        $instabook->image_path = $request->image_path;

        $instabook->save();

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
