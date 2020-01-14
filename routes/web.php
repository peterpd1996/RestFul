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
use App\Events\FormSubmit;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('demo-pusher','FrontEndController@getPusher');
// Truyển message lên server Pusher
 Route::get('fire-event','FrontEndController@fireEvent');
 Route::get('counter',function(){
     return view('counter');
 });

 Route::get('sender',function(){
    return view('sender');
});

Route::post('sender',function(){
    $text = request()->text;
    event(new FormSubmit($text));
});