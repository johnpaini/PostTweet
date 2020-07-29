<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users','HomeController@getUsers');
Route::get('/posts' , 'PostController@getPosts');
Route::get('/postprivate', 'PostController@getPostPrivate');
Route::get('/postpublic', 'PostController@getPostPublic');
Route::post('/posts/postCreate', 'PostController@postCreate');
Route::post('/posts/repost', 'PostController@repost');
Route::get('/posts/listprivate' , 'PostController@getPostPrivate');
Route::get('/posts/listpublic' , 'PostController@getPostPublic');
Route::delete('/posts/delete' , 'PostController@deletePost');






//Route::match([get, post], '/myteste', 'HomeController@getTest');


