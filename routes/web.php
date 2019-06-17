<?php
Route::get('/', 'PostsController@index');

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('message/create', 'MessagesController@create')->name('messages.create');
Route::post('message', 'MessagesController@store')->name('messages.store');
Route::get('message/{id}', 'MessagesController@show')->name('messages.show');

Route::get('notificaciones', 'NotificationController@index')->name('notifications.index');
Route::patch('notificaciones/{id}', 'NotificationController@read')->name('notification.read');
Route::get('notificaciones/allread', 'NotificationController@allread')->name('notification.allread');
//Route::patch('readnotificaciones/{id}', 'NotificationController@unread')->name('notification.unread');
Route::delete('destroynotificaciones/{id}', 'NotificationController@destroy')->name('notification.destroy');

//Route::get('/', 'PostController@index');
Route::resource('posts', 'PostsController')->names([
    'create' => 'posts.create',
    'show' => 'posts.show'
]);

Route::resource('noticias', 'NoticiasController');

Route::get('vue', function () {
    return view('vue');
});
Route::get('tareatodo', function () {
    return view('vuejs');
});

