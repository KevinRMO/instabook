@extends('layouts.app')

@section('title', 'Accueil InstaBook')

@section('content')
    @foreach ($books as $book)
        <article>
            <section class="card">
                <div class="text-content">
                    <h2> {{$book->title}}</h2>
                    <h5>{{$book->author}}</h5>
                    <p>{{$book->year}} , {{$book->genre_id}}</p>
                    <p>{{$book->content}}</p>
                    <a href="">En savoir plus</a>
                </div>
                <div class="visual">
                    <img
                        src="https://m.media-amazon.com/images/I/61HdYKaCHAL._SL1063_.jpg"
                        alt />
                </div>
            </section>
        </article>
        <br>
    @endforeach  
@endsection