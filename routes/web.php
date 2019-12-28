<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@home')->name('admin');

Route::get('/status', 'DocsStatusController@index')->name("docs.status");
Route::get('/docs/{version?}/{string?}', 'DocsController@index')->name("docs");

Route::get('/articles/{slug}/', 'ArticleController@index')->name("article");
