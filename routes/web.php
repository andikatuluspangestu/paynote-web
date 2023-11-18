<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/home/index');
});

// Login and Register Routes Group
Route::group(['middleware' => ['web']], function () {

    // Login Routes
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@Login');

    // Register Routes
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@Register');

    // Logout Route
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

// Kategori
Route::group(['middleware' => ['auth']], function () {
    Route::get('categories', 'CategoriesController@index')->name('categories');
    Route::get('categories/add', 'CategoriesController@addPage')->name('categories.addPage');
    Route::post('categories/insert', 'CategoriesController@insert')->name('categories.insert');
    Route::get('categories/edit/{id}', 'CategoriesController@editPage')->name('categories.editPage');
    Route::put('categories/update/{id}', 'CategoriesController@update')->name('categories.update');
    Route::get('categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete');
});

// Dashboard Routes
Route::get('/home', 'HomeController@index')->name('home');

// Routes for Login and Register Authentication
Auth::routes();
