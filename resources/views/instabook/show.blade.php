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
                @if($rated) <!-- Vérifie si l'utilisateur a déjà noté ce livre -->
                    <p>Vous avez déjà noté ce livre avec une note de {{ $rated->rate }}/5</p>
                @else
                    <form action="{{ route('instabook.storeRate', $instabook->id) }}" method="post">
                        @csrf
                        <label for="rate" style="color: #88bbcc">Donner une note:</label>
                        <input type="number" id="rate" name="rate" min="0" max="5" required>
                        <button type="submit">Soumettre</button>
                    </form>
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
@endsection