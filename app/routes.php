<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PostsController@index');
Route::get('/posts', 'PostsController@index');
Route::get('/catagory/{category}', 'PostsController@viewByCategory');
Route::get('/date/{year}/{month}', 'PostsController@viewByDate');
Route::get('posts/{id}', 'PostsController@show');
Route::post('posts/{id}', 'CommentsController@store');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::group(array('before'=>'auth'), function() 
{   
    Route::resource('admin/posts', 'AdminPostsController');
	Route::resource('admin/comments', 'AdminCommentsController');
});

View::composer('layouts.nav', 'Blogsite\Composers\NavbarComposer');
View::composer('layouts.partials.archive', 'Blogsite\Composers\SidebarComposer');