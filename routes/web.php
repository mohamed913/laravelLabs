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
})->middleware('auth');
//  the route of the page of create.blade.php
Route::get('/posts/create', 'PostController@create')->middleware('auth');
//  the route of the page of store.blade.php
Route::post('/posts', 'PostController@store')->middleware('auth');
Route::get('/posts', 'PostController@index')->name('posts.index')->middleware('auth');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show')->middleware('auth');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', 'PostController@update')->name('posts.update')->middleware('auth');
Route::DELETE('/posts/{post}', 'PostController@destroy')->name('posts.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//git hub routes
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');



//google routes
Route::get('login/google', 'Auth\LoginController@gredirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@ghandleProviderCallback');
