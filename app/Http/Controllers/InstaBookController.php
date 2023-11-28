<?php

namespace App\Http\Controllers;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(InstaBook $instabook)
    {
        $instabook['author'] = $instabook->getAuthor();
        $instabook['genre'] = $instabook->getGenre();
        $instabook['rate'] = $instabook->getRate();
        
        return view('instabook.show')->with(['book'=> $instabook]);
    }

    public function edit(InstaBook $instabook)
    {
        //
    }

    public function update(Request $request, InstaBook $instabook)
    {
        //
    }

    public function destroy(InstaBook $instabook)
    {
        //
    }
}
