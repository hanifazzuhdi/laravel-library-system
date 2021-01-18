<?php

use Illuminate\Support\Facades\Route;

// Route
Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');
Route::get('authors', 'HomeController@author')->name('admin.authors');

Route::post('authors/create', 'AuthorController@store')->name('admin.authors.strote');
