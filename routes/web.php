<?php

Route::get('/', 'ViewController@index');
Route::get('/add', 'ViewController@addnewbook');
Route::get('/viewbooks', 'BooksController@view');
Route::get('/search', 'BooksController@view');
Route::get('/search/borrowed', 'BooksController@viewborrowed');
Route::get('/logout', 'UsersController@logout');
Route::get('/borrow/{id}', 'BooksController@borrow');
Route::get('/borrow', 'BooksController@show');
Route::get('/return/{book_id}', 'BooksController@returnbook');

Route::post('/addbook', 'BooksController@create');
Route::post('/register', 'UsersController@create');
Route::post('/login', 'UsersController@login');
