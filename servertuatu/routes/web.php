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
    return view('home');
})->middleware('guest')->name('login');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home#group', 'HomeController@index')->name('home.team');
Route::get('/home#feedbackTab', 'HomeController@index')->name('home.feedback');

Route::get('/evaluate/skills/{document}/{evaluation}', 'HomeController@skills')->name('skills')->middleware('is.evaluator');
Route::get('/evaluate/functions/{document}/{evaluation}', 'HomeController@functions')->name('functions')->middleware('is.evaluator');
Route::post('/evaluate/skills/{document}/{evaluation}', 'HomeController@saveSkills')->name('skills.save')->middleware('is.evaluator');
Route::post('/evaluate/functions/{document}/{evaluation}', 'HomeController@saveFunctions')->name('functions.save')->middleware('is.evaluator');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('/evaluate/feedback/{document}/{evaluation}', 'HomeController@createFeedback')->name('feedback.save')->middleware('is.feedback');
Route::post('/evaluate/feedbackcontrol/{document}/{evaluation}', 'HomeController@createFeedbackControl')->name('feedbackcontrol.save')->middleware('is.feedback');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::middleware(['admin.user'])->group(function () {
	    Route::get('/reports', 'HomeController@showReports')->name('reports');
		Route::get('/reports-detail/{document}/{evaluation}', 'HomeController@viewReport')->name('report.detail');
		Route::post('/evaluate/feedback-disable/{document}/{evaluation}', 'HomeController@disableFeedBack')->name('feedback.disable');
		Route::post('/evaluate/feedback-close/{document}/{evaluation}', 'HomeController@closeFeedBack')->name('feedback.close');
		Route::post('/evaluate/feedbackcontrol-close/{document}/{evaluation}', 'HomeController@closeFeedBackControl')->name('feedbackcontrol.close');
	});
});
