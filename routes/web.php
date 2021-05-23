<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/my-snippets', 'HomeController@index')->name('home');
Route::post('/users/store', 'HomeController@store')->name('user.register');

Route::resource('snippets', 'SnippetController');

Route::resource('categories', 'CategoryController');

Route::resource('tags', 'TagController');

Route::get('/u/{username}', 'HomeController@profile')->name('profile');
