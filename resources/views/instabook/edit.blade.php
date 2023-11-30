@extends('layouts.app')

@section('title', "Modification d'un Livre existant")

@section('content')

    <form action='{{route("instabook.update", $instabook['id'])}}' method='post'>
        @csrf
        @method('put')

        <input type='text' name='title' placeholder='Titre du Livre' value='{{ old('title', $instabook->title) }}'>
        @if($errors->has('title'))
            <p>{{$errors->first("title")}}</p>
        @endif

        <select name='author_id'>
            @foreach ($authors as $author)
                <option value='{{$author->id}}' {{ $author->id == old('author_id', $instabook->author_id) ? 'selected' : '' }}>
                    {{$author->name}} {{-- Assurez-vous d'adapter le nom de l'attribut d'auteur --}}
                </option>
            @endforeach
        </select><br>

        <select name='genre_id'>
            @foreach ($genres as $genre)
                <option value='{{$genre->id}}' {{ $genre->id == old('genre_id', $instabook->genre_id) ? 'selected' : '' }}>
                    {{$genre->name}} {{-- Assurez-vous d'adapter le nom de l'attribut de genre --}}
                </option>
            @endforeach
        </select><br>
       
        Année de publication : <input type='text' name='year' value='{{ old('year', $instabook->year) }}'>
        @if($errors->has('year'))
            <p>{{$errors->first('year')}}</p>
        @endif

        Synopsis : <textarea name='content'>{{ old('content', $instabook->content) }}</textarea>
        @if($errors->has('content'))
            <p>{{$errors->first('content')}}</p>
        @endif

        {{-- Gestion de l'image --}}
        {{-- Image : <input type='file' name='image'> --}}
        {{-- Ajoutez la gestion de l'image si nécessaire --}}

        <input type='Submit' value='Modifier'>
    </form>
   
@endsection
