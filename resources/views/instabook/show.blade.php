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
            <div class="visual">
                <img
                    src="https://m.media-amazon.com/images/I/61HdYKaCHAL._SL1063_.jpg"
                    alt />
            </div>
          

            <br>
            <div class="form">  
                <form class="" action="{{route('instabook.edit', $instabook['id'])}}" method="get">
                        @csrf
                        <button class="editButton" type="submit"><i class="fa-solid fa-pencil"></i></button>
                        
                        </button>
                    </form>
                <form action="destroyButton"{{route('instabook.destroy', $instabook['id'])}} method="post">
                    @csrf
                    @method('delete')
                    <button class="destroyButton" type="submit"><i class="fa-solid fa-trash "></i></button>
                    
                    </button>
                </form>
            </div>
        </section>  

    </article>
@endsection

