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

Route::get('/', 'UserController@getIndex');

Route::get('/admin', 'UserController@getQuizzes');

Route::get('/admin-step1/{quizId}', 'UserController@getStep1');

Route::get('/admin-step2/{quizId}', 'UserController@getStep2');

Route::get('/admin-step3/{quizId}', 'UserController@getStep3');

Route::get('/admin-step4/{quizId}', 'UserController@getStep4');

Route::get('/admin-step5/{quizId}', function ( $quizId ) {
    return view('admin-step5', ['quizId' => $quizId]);
});

Route::get('/compare/{quizId}', function ( $quizId ) {
    return view('compare', ['quizId' => $quizId]);
});

Route::post('/newQuiz', 'UserController@newQuiz');

Route::get('/questions', function () {
    return view('questions');
});

Route::get('/quiz/{quizId}', 'UserController@getQuiz');

Route::get('/quiz-overview/{quizId}/{userArray}', 'UserController@getOverview');

Route::get('/results/{quizId}/{userArray}', 'UserController@getResult');

Route::post('/removeQuiz', 'UserController@removeQuiz');

Route::post('/removeProduct/{quizId}', 'UserController@removeProduct');

Route::post('/removeTrait/{quizId}', 'UserController@removeTrait');

Route::post('/submitProduct', 'UserController@SubmitProduct');

Route::post('/submitRanks/{quizId}', 'UserController@SubmitRanks');

Route::post('/submitTrait/{quizId}', 'UserController@SubmitTrait');

Route::post('/updateQuiz/{quizId}', 'UserController@updateQuiz');

Route::post('/uploadImage', 'UserController@uploadImage');

// Redirect to admin if no params
Route::get('/admin-step1', 'UserController@getQuizzes');
Route::get('/admin-step2', 'UserController@getQuizzes');
Route::get('/admin-step3', 'UserController@getQuizzes');
Route::get('/admin-step4', 'UserController@getQuizzes');
Route::get('/admin-step5', 'UserController@getQuizzes');

// Redirect to landing if no params
Route::get('/results', 'UserController@getIndex');
Route::get('/compare', 'UserController@getIndex');
