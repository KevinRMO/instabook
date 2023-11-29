@extends('layouts.app')

@section('title', "Modification d'un Livre existant")

@section('content')

    <form action='{{route("instabook.update", $instabook['id'])}}' method='post'>
        @csrf

        @method('put')

        <input type='text' name='title' placeholder='Titre du Livre' value='{{old('title', $instabook['title'])}}'>
        @if($errors->has('title'))
            <p>{{$errors->first("title")}}</p>
        @endif
         <select name='author_id'>
            @foreach ($authors as $author)
                <option value='{{$author['id']}}'
                @if($author['id']==old('author_id', $author['author_id']))
                    selected
                @endif
                >{{$type['author']}}</option>
            @endforeach
        </select><br>
         <select name='genre_id'>
            @foreach ($genres as $genre)
                <option value='{{$genre['id']}}'
                @if($genre['id']==old('genre_id', $genre['genre_id']))
                    selected
                @endif
                >{{$genre['genre']}}</option>
            @endforeach
        </select><br>
       
        Année de publication : <input type='year' name='year' value='{{old('year', $instabook['year'])}}'>
        @if($errors->has('year'))
            <p>{{$errors->first('year')}}</p>
        @endif
         Synopsis : <input type='content' name='content' value='{{old('content', $instabook['content'])}}'>
        @if($errors->has('content'))
            <p>{{$errors->first('content')}}</p>
        @endif
        <input type='Submit' value='Modifier'>
    </form>
   
@endsection