<?php

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/test', 'HomeController@test')
    ->name('test');

Route::get('/status', 'DocsStatusController@index')
    ->name('docs.status');

Route::get('/docs/{version?}/{page?}', 'DocsController@index')
    ->middleware('version')
    ->name('docs');

Route::get('/articles/{slug}/', 'ArticleController@index')->name('article');
