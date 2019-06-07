@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach (App\Noticia::latest()->get() as $noticia)
                <div class="card-header"><a href="{{route('noticias.show', $noticia)}}">{{$noticia->title}}</a>
                </div>
                <!--<div class="card-body"></div> -->
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection