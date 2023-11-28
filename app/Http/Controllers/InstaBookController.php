<?php

namespace App\Http\Controllers;

use App\Models\InstaBook;
use Illuminate\Http\Request;

class InstaBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = InstaBook::All();
        return view('instabook.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(InstaBook $instaBook)
    {
        $instaBook['author'] = $instaBook->getAuthor();
        $instaBook['genre'] = $instaBook->getGenre();
        $instaBook['rate'] = $instaBook->getRate();
        
        return view('instabook.show', compact('instabook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstaBook $instaBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstaBook $instaBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstaBook $instaBook)
    {
        //
    }
}
