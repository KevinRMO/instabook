@extends('layouts.app')

@section('title', 'Livre détaillé')

@section('content')

    <article>
        <section class="show">
            <div class="text-content">
                <h2> {{$instabook->title}}</h2>
                <h5>{{ $instabook->author->firstname }} {{ $instabook->author->lastname }}</h5>
                <p>{{$instabook->year}} , {{$instabook->genre_id}}</p>
                <p>{{$instabook->content}}</p>
            </div>
            <img class="visual" src={{ $instabook->image_path }}>
          

            <br>
            <div class="form">  
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
            </div>
        </section>  

    </article>
@endsection

