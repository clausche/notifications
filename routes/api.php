<?php

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Hash;

Route::middleware('auth:api')->get('/users', function(){
    return User::all();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/otra', function () {
    return 'ruta protegida';
});

Route::post('login', function () {
    if ($user = User::whereEmail(request('email'))->first()) 
    {
        if (Hash::check(request('password'), $user->password)) {
            return response()->json([
                'message' => 'Bienvenido ' . $user->name,
                'api_token' => $user->api_token
            ],200);
        }
    } 
    else 
    {
        return response()->json([
            'mesage' => 'tus credenciales son incorrectas'
        ],401);
    }

    
});
