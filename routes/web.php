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

Route::get('/admin-step1/{quizId}', function () {
    return view('admin-step1');
});

Route::get('/admin-step1/{quizId}', 'UserController@getStep1');

Route::get('/admin-step2/{quizId}', function () {
    return view('admin-step2');
});

Route::get('/admin-step2/{quizId}', 'UserController@getStep2');

Route::get('/admin-step3/{quizId}', function () {
    return view('admin-step3');
});

Route::get('/admin-step3/{quizId}', 'UserController@getStep3');

Route::get('/admin-step4', function () {
    return view('admin-step4');
});

Route::get('/admin-step4/{quizId}', 'UserController@getStep4');

Route::get('/admin-step5/{quizId}', function () {
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

Route::post('/submitProduct/{quizId}', 'UserController@SubmitProduct');

Route::post('/submitTrait/{quizId}', 'UserController@SubmitTrait');

Route::post('/updateQuiz/{quizId}', 'UserController@updateQuiz');

Route::post('/uploadImage', 'UserController@uploadImage');