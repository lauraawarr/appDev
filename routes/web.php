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

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin', 'UserController@getAdmin');

Route::get('/questions', function () {
    return view('questions');
});

Route::get('/questions', 'UserController@getQuestions');


Route::get('/results', function () {
    return view('results');
});

Route::get('/results/{userArray}', 'UserController@getResult');

Route::post('/submitProduct', 'UserController@SubmitProduct');

Route::post('/submitQuestion', 'UserController@SubmitQuestion');