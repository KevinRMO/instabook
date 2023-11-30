@extends('layouts.app')

@section('title', `Création d'un Livre`)

@section ('content')

<div class="card">
    <form action="{{ route('instabook.store') }}" method='post' class="my-form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
         <input type="hidden" name="user_id" value="{{ auth()->id() }}">
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
    <label for="year">Année de publication :</label>
    <input type="year" name="year" id="year" class="form-control inpcreate">
    @if($errors->has('year'))
        <p>{{$errors->first('year')}}</p>
    @endif
</div>

<div class="form-group">
    <label for="content">Synopsis :</label>
    <textarea name="content" id="content" class="form-control inpcreate"></textarea>
    @if($errors->has('content'))
        <p>{{$errors->first('content')}}</p>
    @endif
</div>

<div class="form-group">
    <label for="image_path">Image :</label>
    <input type="file" name="image_path" id="image_path" class="form-control-file" accept="image/jpeg/jpg/png/gifg" onchange="previewImage(event)">
    @if($errors->has('image_path'))
        <p>{{$errors->first('image_path')}}</p>
    @endif
</div>

<div class="form-group">
    <img id="imagePreview" src="#" alt="Aperçu de l'image" style="display: none; max-width: 200px; max-height: 200px;">
</div>

<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.style.display = 'block';
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

        <input type='submit' value='Créer' class="btn btn-primary inpcreate">
    </form>
</div>

@endsection
