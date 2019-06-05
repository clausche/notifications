@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Notificaciones</h1>
    <div class="row">
        <div class="col-md-6">
            <h2>No leidas</h2>
            <ul class="list-group">
                @foreach ($unreadNotifications as $unreadNotification)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{$unreadNotification->data['link']}}">{{$unreadNotification->data['text']}}
                    </a>

                    <form method="POST" action="{{route('notification.read', $unreadNotification->id)}}">
                        @method('PATCH')
                        @csrf
                        <button class="badge badge-danger badge-pill">x</button>
                    </form>


                </li>
                @endforeach
            </ul>
        </div>
        
        <div class="col-md-6">
                <h2>Leidas</h2>
                <ul class="list-group">
                    @foreach ($readNotifications as $readNotification)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{$readNotification->data['link']}}">{{$readNotification->data['text']}}</a>
                        <form method="POST" action="{{route('notification.destroy', $readNotification->id)}}">
                                @method('DELETE')
                                @csrf
                                <button class="badge badge-danger badge-pill">x</button>
                            </form>
                    </li>
                    @endforeach
                </ul>
    
            </div>
    </div>

</div>
@endsection