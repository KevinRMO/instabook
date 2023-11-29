@extends('layouts.app')

@section('title', "Modification d'un Livre existant")

@section('content')
<<<<<<< HEAD
    <form action='{{route("instabook.update", $instabook['title'])}}' method='post'>
=======

    <form action='{{route("instabook.update", $instabook['id'])}}' method='post'>
>>>>>>> 1231ebd0cc936ec9deee97971a39f6952b5240e6
        @csrf

        @method('put')

        <input type='text' name='title' placeholder='Titre du Livre' value='{{old('title', $instabook['title'])}}'>
        @if($errors->has('title'))
            <p>{{$errors->first("title")}}</p>
        @endif
<<<<<<< HEAD
         <select name='author'>
            @foreach ($authors as $author)
                <option value='{{$author['author']}}'
                @if($author['id']==old('author', $author['author']))
=======
         <select name='author_id'>
            @foreach ($authors as $author)
                <option value='{{$author['id']}}'
                @if($author['id']==old('author_id', $author['author_id']))
>>>>>>> 1231ebd0cc936ec9deee97971a39f6952b5240e6
                    selected
                @endif
                >{{$type['author']}}</option>
            @endforeach
        </select><br>
<<<<<<< HEAD
         <select name='genre'>
            @foreach ($genres as $genre)
                <option value='{{$genre['genre']}}'
                @if($genre['id']==old('genre', $genre['genre']))
=======
         <select name='genre_id'>
            @foreach ($genres as $genre)
                <option value='{{$genre['id']}}'
                @if($genre['id']==old('genre_id', $genre['genre_id']))
>>>>>>> 1231ebd0cc936ec9deee97971a39f6952b5240e6
                    selected
                @endif
                >{{$genre['genre']}}</option>
            @endforeach
        </select><br>
       
<<<<<<< HEAD
        Points de vie : <input type='year' name='year' value='{{old('year', $instabook['pv'])}}'>
        @if($errors->has('pv'))
            <p>{{$errors->first('pv')}}</p>
=======
        Année de publication : <input type='year' name='year' value='{{old('year', $instabook['year'])}}'>
        @if($errors->has('year'))
            <p>{{$errors->first('year')}}</p>
>>>>>>> 1231ebd0cc936ec9deee97971a39f6952b5240e6
        @endif
         Synopsis : <input type='content' name='content' value='{{old('content', $instabook['content'])}}'>
        @if($errors->has('content'))
            <p>{{$errors->first('content')}}</p>
        @endif
        <input type='Submit' value='Modifier'>
    </form>
   
@endsection