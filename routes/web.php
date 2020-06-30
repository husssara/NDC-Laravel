<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/country', 'CountryController@index')->name('country');
Route::get("/country/create","CountryController@create")->name('create-country');
Route::post("/country/create","CountryController@postCreate")->name('post-country');
Route::get("/country/delete/{id}","CountryController@delete")->name('delete-country');

Route::get("/country/edit/{id}","CountryController@edit")->name('edit-country');
Route::post("/country/edit/{id}","CountryController@postEdit")->name('post-edit-country');

//City Resource Controller

Route::resource("city","CityController");
Route::get("/city/delete/{id}","CityController@destroy")->name('delete-city');


//Category Resource Controller
Route::resource('categories', 'CategoryController');
Route::get("/categories/{id}/delete","CategoryController@destroy")->name('delete-category');
//News Resource Controller
Route::resource('news', 'NewsController');
Route::get("/news/{id}/delete","NewsController@destroy")->name('delete-news');