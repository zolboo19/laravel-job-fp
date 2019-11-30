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


Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

//jobs
Route::get('/', 'JobController@index')->name('job.index');
Route::get('/jobs/create', 'JobController@create')->name('jobs.create');
Route::post('/jobs/create', 'JobController@store')->name('jobs.store');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/jobs/{id}/{job}/editmyjob', 'JobController@edit')->name('jobs.edit');
Route::post('/jobs/{id}/editmyjob', 'JobController@update')->name('jobs.update');
Route::get('/jobs/myjob', 'JobController@myjob')->name('myjob');
Route::get('/applications/{id}', 'JobController@apply')->name('apply');

Route::get('/jobs/aplicantions', 'JobController@applicant')->name('applicants');
Route::get('/jobs/alljobs', 'JobController@alljobs')->name('alljobs');


//company
Route::get('company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('company/create', 'CompanyController@create')->name('company.create');
Route::post('company/create', 'CompanyController@update')->name('company.update');
Route::post('company/coverphoto', 'CompanyController@coverphoto')->name('company.cover.photo');
Route::post('company/logo', 'CompanyController@logo')->name('company.logo');

//users
Route::get('/user/profile', 'UserController@index')->name('user.profile');
Route::post('/user/profile/create', 'UserController@update')->name('user.profile.update');
Route::post('/user/profile/coverletter', 'UserController@coverletter')->name('user.profile.coverletter');
Route::post('/user/profile/resume', 'UserController@resume')->name('user.profile.resume');
Route::post('/user/profile/avatar', 'UserController@avatar')->name('user.profile.avatar');

//Employers
Route::view('employer/register', 'auth.employer-register')->name('employer.create');
Route::post('employer/register', 'EmployerRegisterController@store')->name('employer.register');
