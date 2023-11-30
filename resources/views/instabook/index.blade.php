@extends('layouts.app')

@section('title', 'Accueil Instabook')

@section('content')
    <div class="parent">
        @foreach ($instabook as $instabook)
            <article>
                <section class="card">
                    <img class="visual" src={{ $instabook->image_path }}>
                        <div class="text-content">
                            <h2>{{ $instabook->title }}</h2><br>
                            <h3>{{ $instabook->author->firstname }} {{ $instabook->author->lastname }}</h3>
                            <a href="{{route('instabook.show', $instabook->id)}}">En savoir plus</a>
                        </div>
                    <br>
                </section>
            </article>
            <br>
        @endforeach
    </div>
@endsection