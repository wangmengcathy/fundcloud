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

Route::get('/', 'HomeController@index');

Route::resource('projects','ProjectController');
Route::get('projects/{id}/pledge','ProjectController@pledge');
Route::post('/pledgestore','ProjectController@pledgestore');
Route::post('/projects/{project}/comments','CommentsController@store');
Route::get('/projects/{user_id}/others','OthersController@others');
Route::post('/projects/follow','OthersController@follow');
Route::post('/projects/unfollow','OthersController@unfollow');

Route::get('projects/{project}/rate','RateController@index');
Route::post('/rate','RateController@store');

Route::get('/{project}/finish','ProjectController@announceFinish');

Route::get('/{project}/posting','PostingsController@edit');
Route::post('/posting','PostingsController@storeposting');

Route::get('/profile','UserController@profile');
Route::post('/profile','UserController@storeprofile');


Route::post('/projects/like','LikeController@like');
Route::post('/projects/unlike','LikeController@unlike');


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home/search/{search_content}', 'HomeController@search');

Route::get('/home/follows', 'HomeController@follows');

Route::get('/home/recommend', 'HomeController@recommend');

Route::get('/home/popular', 'HomeController@popular');

Route::get('/home/likefeeds', 'UserController@likefeeds');

Route::get('/home/pledgefeeds', 'UserController@pledgefeeds');

Route::get('/home/myprojects', 'UserController@myprojects');
