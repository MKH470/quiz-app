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
Auth::routes([
    'register'=>false,
    'reset'=>false,
    'verify'=>false
]);

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function (){

Route::get('quiz/{quizId}', 'ExamController@getQuizQuestions');
Route::post('quiz/create', 'ExamController@postQuiz');
Route::get('/result/user/{userId}/quiz/{quizId}','ExamController@viewResult');

});



Route::group(['prefix' =>'admin','middleware' => 'isAdmin'], function (){
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('quiz', 'QuizController');
    Route::resource('question', 'QuestionController');
    Route::resource('user', 'UserController');
    Route::get('exam/assign', 'ExamController@create');
    Route::post('exam/assign', 'ExamController@assignExam')->name('exam.assign');
    Route::get('exam/users', 'ExamController@userExam')->name('view.exam');
    Route::get('exam/users/{id}', 'ExamController@userExamView')->name('view.exam.user');
    Route::post('exam/delete', 'ExamController@removeExam')->name('exam.remove');
     Route::post('exam/delete', 'ExamController@removeExam')->name('exam.remove');
     Route::get('exam/result', 'ExamController@resultExam')->name('result.index');
     Route::get('exam/result/{userId}/{quizId}', 'ExamController@viewResultExam')->name('view.exam.result');
});

