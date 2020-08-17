<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/game', 'HomeController@index')->name('game');

Route::post('answer', 'AnswerController@store')->name('answer.store');

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
	Route::get('home', 'AdminController@index')->name('admin.home');
	Route::get('players', 'AdminController@players')->name('admin.players');
	Route::get('delete/{slug}', 'AdminController@deletePlayer')->name('admin.deleteplayer');
    Route::get('round/{round}/question/{question}', 'AdminController@answers');
    Route::patch('correctAnswers/{slug}', 'AdminController@correctAnswers')->name('correctAnswers');
});