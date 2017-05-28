<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function(){

	Route::get('/notifications/{username}','NotificationsController@index');

	Route::get('/post/{post_id}','PostsController@post');

	Route::get('/post/delete/{post_id}','PostsController@delete');

	Route::get('/post/play/{post_id}','PostsController@play');

	Route::get('/post/like/{post_id}','PostsController@like');

	Route::get('/post/unlike/{post_id}','PostsController@unlike');

	Route::get('/profile/{username}/about','ProfileController@about');

	Route::get('/profile/{username}/posts','PostsController@profile');

	Route::post('/create_post/{username}','PostsController@create');

	Route::post('/profile/update_photo/{id}','ProfileController@updatePhoto');

	Route::get('/profile/{username}/settings/','ProfileController@edit');

	Route::put('user/settings/{id}','ProfileController@update');

	Route::get('/discover', 'DiscoverController@index');

	Route::post('/discover/jammers', 'DiscoverController@discover');

	Route::get('/profile/follow/{username}', 'ProfileController@followUser');

// Route::resource('/comments/{{post_id}}','CommentsController');

	Route::get('/profile/unfollow/{username}', 'ProfileController@unfollowUser');


	// Route::get('/profile/{username}/posts', 'PostsController@index');
	Route::post('/create_comment/{post_id}', 'PostsController@comment');

	Route::resource('genre', 'GenreController',['except'=>['create']]);

	Route::resource('/comments/{{post_id}}','CommentsController');


	Route::get('/messages', 'MessageController@getMessages');

	Route::post('/messages', 'MessageController@sendMessage');

	Route::get('/messages/{conversation_num}', 'MessageController@getConversation');

	Route::get('/sentmessages', 'MessageController@sentMessages');

	Route::post('/sendconversation', 'MessageController@sendConversation');
});