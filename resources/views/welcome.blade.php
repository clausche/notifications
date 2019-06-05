@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <notifications></notifications>
                <div class="card">
                        @foreach (App\Post::latest()->get() as $post)
                <div class="card-header"><a href="{{route('posts.show', $post)}}">{{$post->description}}</a></div>
                        <!--<div class="card-body"></div> -->
                        @endforeach
                    </div>
        </div>
    </div>
    
</div>
@endsection