@extends('layouts.app')

@section('title', "Modification d'un Livre existant")

@section('content')
<div class="card">
    <form action='{{ route("instabook.update", $instabook->id) }}' method='post' enctype="multipart/form-data" class="my-form">
        @csrf
        @method('put')

        <div class="form-group">
        <label for="title">Titre du livre:</label>
            <input type='text' name='title' placeholder='Titre du Livre' value='{{ old('title', $instabook->title) }}' class="form-control">
            @if($errors->has('title'))
                <p class="text-danger">{{ $errors->first("title") }}</p>
            @endif
        </div>

        <div class="form-group">
        <label for="author">Auteur:</label>
            <select name='author_id' class="form-control">
                @foreach ($authors as $author)
                    <option value='{{$author->id}}' {{ $author->id == old('author_id', $instabook->author_id) ? 'selected' : '' }}>
                        {{$author->name}} 
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
         <label for="genre">Genre:</label>
            <select name='genre_id' class="form-control">
                @foreach ($genres as $genre)
                    <option value='{{$genre->id}}' {{ $genre->id == old('genre_id', $instabook->genre_id) ? 'selected' : '' }}>
                        {{$genre->name}} 
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            Année de publication : <input type='text' name='year' value='{{ old('year', $instabook->year) }}' class="form-control">
            @if($errors->has('year'))
                <p class="text-danger">{{$errors->first('year')}}</p>
            @endif
        </div>

        <div class="form-group">
            Synopsis : <textarea name='content' class="form-control">{{ old('content', $instabook->content) }}</textarea>
            @if($errors->has('content'))
                <p class="text-danger">{{$errors->first('content')}}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="image_path">Image:</label>
            <input type="file" name="image_path" class="form-control-file">
            @if($errors->has('image_path'))
                <p class="text-danger">{{ $errors->first('image_path') }}</p>
            @endif
        </div>

        <div class="form-group">
            <input type='submit' value='Modifier' class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
