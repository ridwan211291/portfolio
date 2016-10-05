<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\test;

Route::get('/', function () {
    return view('welcome');
});

Route::get('form', function(){
	return view('form');
});

Route::post('post', function(test $request){
	return $request->title ;
});
