<?php

use App\Message;
use Illuminate\Http\Request;


Route::get('posts','PagesController@home');
Route::get('blog/{post}','PostsController@show');
Route::get('etiquetas/{tag}','TagsController@show');
Route::post('mensajes', 'Admin\MessagesController@store');


// Route::post('mensajes', function (Request $request) {
//     $messages = Message::create($request->all()); 
    
//     return $messages;
//   return response()->json([
//       'status' => 'OK'
//     ]);
// });