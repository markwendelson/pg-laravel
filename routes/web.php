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

Route::get('/logout',function(){
    Auth::logout();
    return view('welcome');
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/{id}', 'HomeController@user')->name('user');
Route::get('/comments', 'CommentController@index')->name('comment.index');
Route::post('/comments', 'CommentController@store')->name('comment.store');
