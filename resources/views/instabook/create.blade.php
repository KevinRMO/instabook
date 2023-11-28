@extends('layouts.app')

@section('title', `Création d'un Livre`)

@section ('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
     <div class="card">
        <form action={{route("instabook.store")}} method='post'>
        @csrf
          Titre du livre:  <input type='text' name='title' placeholder='Nom du Livre'><br>
            @if($errors->has('title'))
                <p>{{$errors->first('title')}}</p>
            @endif
           Auteur: <select name='author'>
            @foreach ($authors as $author)
                <option value='{{$author['lastname']}}'
                @if($author['lastname']
                {{-- ==old('type_id') --}}
                )
                    selected
                @endif
                >{{$author['lastname']}}</option>
            @endforeach
        </select><br>
        Genre: <select name='genre'>
            @foreach ($genres as $genre)
                <option value='{{$genre['genre']}}'
                @if($genre['genre']
                {{-- ==old('genre_id') --}}
                )
                    selected
                @endif
                >{{$genre['genre']}}</option>
            @endforeach
        </select><br>

            Année de publication: <input type='year' name='year'><br>
             @if($errors->has('year'))
                <p>{{$errors->first('year')}}</p>
            @endif
            Synopsis: <input type='text' name='content'><br>
             @if($errors->has('content'))
                <p>{{$errors->first('content')}}</p>
            @endif
            <input type='submit' value='Créer'>
        </form>
        </div>
@endsection