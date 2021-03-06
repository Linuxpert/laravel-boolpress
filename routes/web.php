<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'GuestController@home')->name('home');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/login', 'Auth\LoginController@login') ->name('login');

Route::get('/post/edit/{id}', 'GuestController@edit') -> name('post.edit');
Route::post('/post/update/{id}', 'GuestController@update') -> name('post.update');

Route::get('/post/delete/{id}', 'GuestController@delete') -> name('post.delete');

Route::get('/logout', 'Auth\LoginController@logout') ->name('logout');

Route::post('/store', 'GuestController@store') -> name('store');