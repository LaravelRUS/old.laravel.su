<?php

Route::get('/', 'HomeController@index')
    ->name('home');

// -----------------------------------------------------------------------------
//  Test
// -----------------------------------------------------------------------------

Route::get('/test', 'HomeController@test')
    ->name('test');

// -----------------------------------------------------------------------------
//  Documentation
// -----------------------------------------------------------------------------

Route::get('/docs/{version?}', 'DocsController@index')
    ->middleware('version')
    ->name('docs');

Route::get('/docs/{version}/{page}', 'DocsController@show')
    ->middleware('version')
    ->name('docs.show');

// -----------------------------------------------------------------------------
//  Status
// -----------------------------------------------------------------------------

Route::get('/status', 'StatusController@index')
    ->name('status');

Route::get('/status/{version}', 'StatusController@show')
    ->middleware('version')
    ->name('status.show');

// -----------------------------------------------------------------------------
//  Articles
// -----------------------------------------------------------------------------

Route::get('/articles/{urn}', 'ArticleController@index')
    ->name('article');
