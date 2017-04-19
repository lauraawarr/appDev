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

Route::get('/admin', 'UserController@getQuizzes');

Route::get('/admin-step1/{quizId}', 'UserController@getStep1');

Route::get('/admin-step2/{quizId}', function () {
    return view('admin-step2');
});

Route::get('/admin-step2/{quizId}', 'UserController@getStep2');

Route::get('/admin-step3/{quizId}', 'UserController@getStep3');

Route::get('/admin-step4/{quizId}', 'UserController@getStep4');

Route::get('/admin-step5/{quizId}', 'UserController@getStep5');

Route::post('/newQuiz', 'UserController@newQuiz');

Route::get('/questions', function () {
    return view('questions');
});

Route::get('/quiz/{quizId}', 'UserController@getQuiz');

Route::get('/results/{quizId}/{userArray}', 'UserController@getResult');

Route::post('/removeQuiz', 'UserController@removeQuiz');

Route::post('/removeProduct/{quizId}', 'UserController@removeProduct');

Route::post('/removeTrait/{quizId}', 'UserController@removeTrait');

Route::post('/submitProduct', 'UserController@SubmitProduct');

Route::post('/submitRanks/{quizId}', 'UserController@SubmitRanks');

Route::post('/submitTrait/{quizId}', 'UserController@SubmitTrait');

Route::post('/updateQuiz/{quizId}', 'UserController@updateQuiz');

Route::post('/uploadImage', 'UserController@uploadImage');