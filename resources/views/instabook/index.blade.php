@extends('layouts.app')

@section('title', 'Accueil InstaBook')

@section('content')
<ol>
    @foreach ($instabook as $book)
    <li>
        {{$book->title}}
        {{$book->author_id}}
    </li>
    @endforeach  
</ol>
@endsection