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

Route::get('/admin', 'UserController@getQuizzes');

Route::get('/admin-step1', function () {
    return view('admin-step1');
});

Route::get('/admin-step2', function () {
    return view('admin-step2');
});

Route::get('/admin-step3', function () {
    return view('admin-step3');
});

Route::get('/admin-step3', 'UserController@getStep3');

Route::get('/admin-step4', function () {
    return view('admin-step4');
});

Route::get('/admin-step4', 'UserController@getStep4');

Route::get('/admin-step5', function () {
    return view('admin-step5');
});

Route::post('/newQuiz', 'UserController@newQuiz');

Route::get('/questions', function () {
    return view('questions');
});

Route::get('/questions', 'UserController@getTraits');


Route::get('/results', function () {
    return view('results');
});

Route::get('/results/{userArray}', 'UserController@getResult');

Route::post('/submitProduct', 'UserController@SubmitProduct');

Route::post('/submitTrait', 'UserController@SubmitTrait');