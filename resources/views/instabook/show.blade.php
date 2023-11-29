@extends('layouts.app')

@section('title', 'Livre détaillé')

@section('content')

    <article>
        <section class="show">
            <div class="text-content">
                <h2>{{$instabook->title}}</h2><br>
                <h3>{{ $instabook->author->firstname }} {{ $instabook->author->lastname }}</h3>
                <p>{{$instabook->year}} , {{$instabook->genre->genre}}</p>
                <p>{{$instabook->content}}</p>
                {{-- <p>{{$instabook->rate}}</p> --}}
                
                <div class="form">  
                    <form class="" action="{{route('instabook.edit', $instabook['id'])}}" method="get">
                            @csrf
                            <button class="editButton" type="submit"><i class="fa-solid fa-pencil"></i></button>                            
                    </form>
                    <form action="destroyButton"{{route('instabook.destroy', $instabook['id'])}} method="post">
                        @csrf
                        @method('delete')
                        <button class="destroyButton" type="submit"><i class="fa-solid fa-trash "></i></button>
                    </form>
                </div>
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

