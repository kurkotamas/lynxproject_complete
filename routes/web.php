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

use App\Term;
use App\UserTerm;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/terms_and_conditions', function () {

    $term = Term::orderBy('published_at', 'DESC')->first();
    return view('terms.terms_and_conditions', compact('term'));
})->name('terms_and_conditions');


Auth::routes(['verify' => true]);

Route::group(['middleware'=>['verified', 'auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/action', 'HomeController@action')->name('home.action');
    Route::resource('users', 'User\UserController', ['only' => ['edit', 'destroy', 'update']]);
    Route::resource('terms', 'Term\TermController');
    Route::match(['put', 'patch'],'users/{user}/unverify', 'User\UserController@unverify')->name('users.unverify');
    Route::match(['put', 'patch'],'terms/{term}/publish', 'Term\TermController@publish')->name('terms.publish');
    Route::get('currently_accepted_terms', function (){
        $user_term = UserTerm::last_accepted_term(Auth::user()->id);
        if($user_term) {
            $term = Term::findOrFail($user_term->term_id);
            return view('terms.terms_and_conditions', compact('term'));
        }
        $term = '';
        return view('terms.terms_and_conditions', compact('term'));

    })->name('currently_accepted_terms');
    Route::resource('user_term', 'UserTermController', ['only' => ['store', 'destroy']]);

});


