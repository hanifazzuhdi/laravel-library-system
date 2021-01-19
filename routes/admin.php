<?php

use Illuminate\Support\Facades\Route;


Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');
Route::get('authors', 'HomeController@author')->name('admin.authors');

Route::get('authors/show/{author}', 'AuthorController@show')->name('admin.author.show');
Route::post('authors/create', 'AuthorController@store')->name('admin.author.store');
Route::post('authors/update/{author}', 'AuthorController@update')->name('admin.author.update');
Route::delete('authors/delete/{author}', 'AuthorController@destroy')->name('admin.author.delete');

Route::get('users', 'UserController@index')->name('admin.users');
Route::delete('users/delete/{user}', 'UserController@destroy')->name('admin.user.delete');

Route::get('books', 'BookController@index')->name('admin.books');
Route::post('books/create', 'BookController@store')->name('admin.books.create');
Route::delete('books/delete/{book}', 'BookController@destroy')->name('admin.user.delete');
