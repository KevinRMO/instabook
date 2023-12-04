@extends('layouts.app')

@section('title', 'Livre détaillé')

@section('content')

    <article>
        <section class="show">
            <div class="text-content">
                <h2>{{$instabook->title}}</h2><br>
                <h3>{{ $instabook->author->firstname }} {{ $instabook->author->lastname }}</h3>
                <p>{{$instabook->year}} , {{$instabook->genre->genre}}</p>
                <p>{{$instabook->content}}</p>
                <p>Note moyenne : {{ number_format($instabook->averageRating(), 1)}}/5</p>
                @if(auth()->user())
                    @if($rated) <!-- Vérifie si l'utilisateur a déjà noté ce livre -->
                        <p>Vous avez déjà noté ce livre avec une note de {{ $rated->rate }}/5</p>
                    @else
                        <form action="{{ route('instabook.storeRate', $instabook->id) }}" method="post">
                            @csrf
                            <label class="noteText" for="rate">Donner une note:</label>
                            <input class="noteInput" type="number" id="rate" name="rate" min="0" max="5" required>
                            <button class="noteButton" type="submit">Soumettre</button>
                        </form>
                    @endif
                    @else
                    <p>Vous devez vous connecter pour pouvoir noter ce livre.</p>
                @endif
                <div class="form">
                    @if(auth()->check() && $instabook->user_id === auth()->user()->id)  
                        <form class="" action="{{route('instabook.edit', $instabook['id'])}}" method="get">
                                @csrf
                                <button class="editButton" type="submit"><i class="fa-solid fa-pencil"></i></button>                            
                        </form>
                        <form action="{{ route('instabook.destroy', $instabook['id']) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="destroyButton" type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce livre ?')">
                                <i class="fa-solid fa-trash "></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <img class="visual" src="/{{ $instabook->image_path }}">
        </section>  
    </article>
        <footer>
        <nav class="footerNavShow" >
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