<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();

Route::get('/', 'HomeController@index');
//Posts
Route::resource('/posts', 'PostsController');
Route::get('my_posts', 'PostsController@userPosts');
//Comments
Route::post('add_comment', 'CommentsController@store');
//Like Routes
Route::get('like_post/{id}', 'LikesController@likePost');
Route::get('like_comment/{id}', 'LikesController@likeComment');
//Search
Route::get('search', 'SearchController@search');
//Api
Route::group(['prefix' => 'api'], function () {
    Route::get('posts', 'ApiController@index');
    Route::get('posts/search', 'ApiController@search');
    Route::get('posts/{id}', 'ApiController@show');

});

Route::group(['middleware' => 'App\Http\Middleware\Admin'], function () {
    Route::get('/admin', 'AdminController@index');
    Route::POST('/change_role', 'AdminController@changeRole');
});

require('Macros/form-macros.php');
