@extends('layouts.app')

@section('title', 'Accueil Instabook')

@section('content')
    @foreach ($instabook as $instabook)
        <article>
            <section class="card">
                <div class="text-content">
                    <h2>{{ $instabook->title }}</h2><br>
                    <h3>{{ $instabook->author->firstname }} {{ $instabook->author->lastname }}</h3>
                    <p>{{ $instabook->year }}, {{ $instabook->genre->genre }}</p>
                    <p>{{ $instabook->content }}</p>
                    <a href="{{route('instabook.show', $instabook->id)}}">En savoir plus</a>
                </div>
                <div class="visual">
                     {{ $instabook->image_path }}
                </div>
                <br>
            </section>
        </article>
        <br>
    @endforeach

@endsection