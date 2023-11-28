@extends('layouts.app')

@section('title', 'Livre détaillé')

@section('content')

    <article>
        <section class="card">
            <div class="text-content">
                <h2> {{$instabook->title}}</h2>
                <h5>{{$instabook->author}}</h5>
                <p>{{$instabook->year}} , {{$instabook->genre_id}}</p>
                <p>{{$instabook->content}}</p>
            </div>
            <div class="visual">
                <img
                    src="https://m.media-amazon.com/images/I/61HdYKaCHAL._SL1063_.jpg"
                    alt />
            </div>
          
        <br>    
        <form class="" action="{{route('instabook.edit', $instabook['id'])}}" method="get">
            @csrf
            <button type="submit">Modifier</button>
            <i class="fa-solid fa-pencil"></i>
            </button>
        </form>
    <form action="{{route('instabook.destroy', $instabook['id'])}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Supprimer</button>
        <i class="fa-solid fa-trash"></i>
        </button>
    </form>
    </section>  
    </article>
@endsection

