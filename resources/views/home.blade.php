@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enviar Mensaje</div>
                    <form action="{{route('messages.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <select class="form-control {{ ($errors->has('recipient_id')) ? 'is-invalid'  :''}}" name="recipient_id">
                                    <option value="">Seleccionar Usuario</option>
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first('recipient_id', "<span class=text-danger>:message</span>")!!}
                            </div>
                            <div class="form-group ">
                                <textarea class="form-control {{ ($errors->has('body')) ? 'is-invalid'  :''}}" name="body" placeholder="Escribe aqui tu Mensaje"></textarea>
                                {!!$errors->first('body', "<span class=text-danger>:message</span>")!!}

                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">Enviar</button>
                                
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection