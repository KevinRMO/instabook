@extends('layouts.app')

@section('title', 'Accueil InstaBook')

@section('content')
    @foreach ($instabook as $book)
        <article>
            <section class="card">
                <div class="text-content">
                    <h2>{{ $book->title }}</h2><br>
                    <h3>{{ $book->author->firstname }} {{ $book->author->lastname }}</h3>
                    <p>{{ $book->year }}, {{ $book->genre->genre }}</p>
                    <p>{{ $book->content }}</p>
                    <a href="{{route('instabook.show', $book->id)}}">En savoir plus</a>
                </div>
                <div class="visual">
                    <img src="https://m.media-amazon.com/images/I/61HdYKaCHAL._SL1063_.jpg" alt />
                </div>
                <br>
            </section>
        </article>
        <br>
    @endforeach
@endsection