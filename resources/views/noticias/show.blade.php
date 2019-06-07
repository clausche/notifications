@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
           <h1> {{ $noticia->title }}</h1>
            <div class="card-header"></div>
            <p>{{ $noticia->body }}</p>
        </div>
    </div>
</div>



@endsection