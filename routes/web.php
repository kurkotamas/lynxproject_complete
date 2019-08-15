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
})->name('index');

Route::get('/terms_and_conditions', function () {
    $terms = \App\Term::all();
    return view('terms.terms_and_conditions', compact('terms'));
})->name('terms_and_conditions');


Auth::routes(['verify' => true]);

Route::group(['middleware'=>['verified', 'auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'User\UserController', ['only' => ['edit', 'destroy', 'update']]);
    Route::resource('terms', 'Term\TermController');
    Route::match(['put', 'patch'],'users/{user}/unverify', 'User\UserController@unverify')->name('users.unverify');
});


