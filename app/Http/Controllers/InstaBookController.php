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

    $image_path = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image_path = $image->storeAs('images', $imageName, 'public');
    }

    InstaBook::create([
        "title" => $request->title,
        "author" => $request->author,
        "genre" => $request->genre,
        "year" => $request->year,
        "content" => $request->content,
        "image_path" => $image_path,
    ]);

    return redirect()->route('instabook.create');
}

    public function show(InstaBook $instabook)
    {

        $instabook['author'] = $instabook->getAuthor();
        $instabook['genre'] = $instabook->getGenre();
        $instabook['rate'] = $instabook->getRate();
        
        return view('instabook.show')->with(['instabook'=> $instabook]);
    }

  
  
    public function edit(InstaBook $instabook)
    {
        $authors = Author::All();
        $genres = Genre::All();
        return view('instabook.create',compact("authors", "genres"));

    }
  public function update(Request $request, InstaBook $instabook){


        $title = ucfirst(strtolower($title));

        if(array_key_exists($title, $this->instabook)){
            $instabook = $this->instabook[$title];
            $instabook['title'] = $title;
            return view('instabook.show', compact('instabook'));
        }else{
            return view('instabook.index')->with([
                'instabook' => $this->instabook,
                'message' => "Le livre $title n'existe pas." 
            ]);
        }
    }

    // public function update(Request $request, string $title)

    // {
    //     $request->validate([
    //         // 'image' => 'required',
    //         'title' => 'required',
    //         'author' => 'required|exists:author,id',
    //         'genre' => 'required|exists:genre,id',
    //         'year' => 'required',
    //         'content' => 'content'
            
    //     ]);
    // }

    public function search(Request $request){

        $search = $request->input('rechercher');
    
        $instabook = InstaBook::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->get();
    
        return view('instabook.index', compact('instabook'));
    }
    
    public function destroy(InstaBook $instabook){

            $title = ucfirst(strtolower($title));
        if (array_key_exists($title, $this ->title)) {

        unset ($this->instabook[$title]);

        return view('instabook.index')-> with([
            'instabook' => $this->instabook,
            'message'=> "Le livre $title a été supprimé"
        ]);
        }
        return view('instabook.index')-> with([
            'instabook' => $this->instabook,
            'message'=> "Le livre $title n'existe pas"
        ]);

    }
}
