@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                
            <div class="card">
                @foreach ($posts as $post)
                <div class="card-header"><a href="{{route('posts.show', $post)}}">{{$post->description}}</a></div>
                <!--<div class="card-body"></div> -->
                @endforeach
            </div>
            <div class="pagination justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>

    </div>

</div>
<v-app>

    <login></login>
</v-app>
@endsection