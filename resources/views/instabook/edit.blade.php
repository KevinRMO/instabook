@extends('layouts.app')

@section('title', 'Modification du livre')

@section('content')
    <form action='' method='post'>
        @csrf

        @method('put')

    </form>
@endsection