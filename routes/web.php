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

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}',['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::group(['middleware' => 'admin','as'=>'admin.'], function () {
    Route::get('/admin', function(){
        return view('admin.index');
    });

    // Route::resource('admin/users', 'AdminUsersController',['names'=>[
    //     'index' =>'admin.users.index',
    //     'create' =>'admin.users.create',
    //     'store' =>'admin.users.store',
    //     'edit' =>'admin.users.edit',
    // ]]);

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/categories', 'AdminCategoriesController');

    Route::resource('admin/media', 'AdminMediasController');

    Route::delete('/delete/media', 'AdminMediasController@deleteMedia');    

    // Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediasController@store']);

    Route::resource('admin/comments', 'PostCommentsController');

    Route::resource('admin/comment/replies', 'CommentRepliesController');
    
});


Route::group(['middleware' => 'auth', 'as'=>'admin.'], function () {
    
    Route::post('comments/reply', 'CommentRepliesController@createReply');

});