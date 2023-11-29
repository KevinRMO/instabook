@extends('layouts.app')

@section('title', `Création d'un Livre`)

@section ('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<div class="card">
    <form action="{{ route('instabook.store') }}" method='post' class="my-form">
        @csrf
        <div class="form-group">
            <label for="title">Titre du livre:</label>
            <input type='text' name='title' id='title' placeholder='Nom du Livre' class="form-control inpcreate">
            @if($errors->has('title'))
                <p>{{$errors->first('title')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="author">Auteur:</label>
            <select name='author' id='author' class="form-control inpcreate">
                @foreach ($authors as $author)
                    <option value='{{$author->id}}'>{{$author->lastname}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <select name='genre' id='genre' class="form-control inpcreate">
                @foreach ($genres as $genre)
                    <option value='{{$genre->id}}'>{{$genre->genre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="year">Année de publication:</label>
            <input type='year' name='year' id='year' class="form-control inpcreate">
            @if($errors->has('year'))
                <p>{{$errors->first('year')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="content">Synopsis:</label>
            <textarea name='content' id='content' class="form-control inpcreate"></textarea>
            @if($errors->has('content'))
                <p>{{$errors->first('content')}}</p>
            @endif
            Image: <input type="file" name="image_path" accept="image/*"><br>
            <input type='submit' value='Créer'>
        </form>
@endsection
