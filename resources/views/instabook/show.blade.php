@extends('layouts.app')

@section('title', 'Livre détaillé')

@section('content')
    
    <form action="" method="get">
        @csrf
        <button type="submit">Envoyer</button>
    </form>
    <form action="" method="post">
        @csrf
        @method('delete')
        <button type="submit">
        <i class="fa-solid fa-trash"></i>
        </button>
    </form>
    
    <h1>Title</h1>
    <h2>by Author</h2>
    <p>Description<p>
    <p>Genre<p>
@endsection