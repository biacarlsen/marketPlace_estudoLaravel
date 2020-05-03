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
    // definindo uma variável e mostrando na view:
    $helloWorld = "Hello World!";
    return view('welcome', compact('helloWorld'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
