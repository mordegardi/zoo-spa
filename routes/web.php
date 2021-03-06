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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', function() {
    if (auth()->check()) {
        auth()->logout();
    }

    return redirect('/');
});

Route::get('currentUser', function() {
    if (auth()->check()) {
        return auth()->user();
    }
});

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
