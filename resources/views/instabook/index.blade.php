@extends('layouts.app')

@section('title', 'Accueil Instabook')

@section('content')
    <div class="parent">
        @foreach ($instabooks as $instabook)
            <article>
                <section class="card">
                    <img class="visual" src={{ $instabook->image_path }}>
                        <div class="text-content">
                            <h2>{{ $instabook->title }}</h2><br>
                            <h3>{{ $instabook->author->firstname }} {{ $instabook->author->lastname }}</h3><br>
                            <h3>{{$instabook->genre}}</h3>
                            <a href="{{route('instabook.show', $instabook->id)}}">En savoir plus</a>
                        </div>
                    <br>
                </section>
            </article>
            <br>
        @endforeach
    </div>
            <footer>
        <nav class="footerNavIndex" >
            <div class="logo" style="display: flex; align-items: center;">
                <a href="/">
                    <img src="https://i.ibb.co/x7jy2Sw/instabook-logo.png" alt="instabook-logo">
                </a>
            </div>
            <ul class="nav-links">              
                <li class="infoFooter"><p>Bocal Academy, 26 Bd Carabacel, 06000 Nice</p></li>
                <li class="infoFooter"><p>04 ** ** ** **</p></li>
                <li class="infoFooter"><p>©Copyright Melodie, Floriane, Jonathan, Kévin<p>
            </ul>
        </nav>
    </footer>
@endsection