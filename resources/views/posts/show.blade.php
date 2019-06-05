@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <p>{{$post->description}}</p>
    <small>{{$post->body}}</small>

</div>
@endsection