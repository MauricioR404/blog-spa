<?php
//Login
Route::auth();

//Rutas para administracion
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], 
function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    
    Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('users', 'UsersController', ['as' => 'admin']);
    Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'] , 'as' => 'admin']);

    Route::resource('messages', 'MessagesController', ['only' => ['index', 'destroy', 'store', 'show'], 'as' => 'admin']);

    Route::middleware('role:Admin')
        ->put('users/{user}/roles', 'UsersRolesController@update')
        ->name('admin.users.roles.update');

    Route::middleware('role:Admin')
        ->put('users/{user}/permissions', 'UsersPermissionsController@update')
        ->name('admin.users.permissions.update');

    Route::post('posts/{post}/photos', 'PhotoController@store')->name('admin.posts.photos.update');
    Route::get('photos/{photo}', 'PhotoController@destroy')->name('admin.photos.destroy');
});

/**Index del blog, Vue SPA*/
Route::get('/{any?}', 'PagesController@spa')->name('pages.home')->where('any', '.*');



