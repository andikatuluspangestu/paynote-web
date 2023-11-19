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

// Incomes
Route::group(['middleware' => ['auth']], function () {
    Route::get('incomes', 'IncomesController@index')->name('incomes');
    Route::get('incomes/add', 'IncomesController@addPage')->name('incomes.addPage');
    Route::post('incomes/insert', 'IncomesController@insert')->name('incomes.insert');
    Route::get('incomes/edit/{id}', 'IncomesController@editPage')->name('incomes.editPage');
    Route::put('incomes/update/{id}', 'IncomesController@update')->name('incomes.update');
    Route::get('incomes/delete/{id}', 'IncomesController@delete')->name('incomes.delete');
});

// Expanses
Route::group(['middleware' => ['auth']], function () {
    Route::get('expenses', 'ExpensesController@index')->name('expenses');
    Route::get('expenses/add', 'ExpensesController@addPage')->name('expenses.addPage');
    Route::post('expenses/insert', 'ExpensesController@insert')->name('expenses.insert');
    Route::get('expenses/edit/{id}', 'ExpensesController@editPage')->name('expenses.editPage');
    Route::put('expenses/update/{id}', 'ExpensesController@update')->name('expenses.update');
    Route::get('expenses/delete/{id}', 'ExpensesController@delete')->name('expenses.delete');
});

// Dashboard Routes
Route::get('/home', 'HomeController@index')->name('home');

// Routes for Login and Register Authentication
Auth::routes();
