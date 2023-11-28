@extends('layouts.app')

@section('title', "Modification d'un Livre existant")

@section('content')
    <form action='{{route("instabook.update", $instabook['title'])}}' method='post'>
        @csrf

        @method('put')

        <input type='text' name='title' placeholder='Titre du Livre' value='{{old('title', $instabook['title'])}}'>
        @if($errors->has('title'))
            <p>{{$errors->first("title")}}</p>
        @endif
         <select name='author'>
            @foreach ($authors as $author)
                <option value='{{$author['author']}}'
                @if($author['id']==old('author', $author['author']))
                    selected
                @endif
                >{{$type['author']}}</option>
            @endforeach
        </select><br>
         <select name='genre'>
            @foreach ($genres as $genre)
                <option value='{{$genre['genre']}}'
                @if($genre['id']==old('genre', $genre['genre']))
                    selected
                @endif
                >{{$genre['genre']}}</option>
            @endforeach
        </select><br>
       
        Points de vie : <input type='year' name='year' value='{{old('year', $instabook['pv'])}}'>
        @if($errors->has('pv'))
            <p>{{$errors->first('pv')}}</p>
        @endif
         Synopsis : <input type='content' name='content' value='{{old('content', $instabook['content'])}}'>
        @if($errors->has('content'))
            <p>{{$errors->first('content')}}</p>
        @endif
        <input type='Submit' value='Modifier'>
    </form>
@endsection