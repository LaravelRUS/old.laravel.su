<?php

use App\Application\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

// -----------------------------------------------------------------------------
//  Home
// -----------------------------------------------------------------------------

Route::get('/', Controllers\Home\ShowController::class)
    ->name('home');

// -----------------------------------------------------------------------------
//  Documentation
// -----------------------------------------------------------------------------

Route::get('/docs/{version?}', Controllers\Documentation\IndexController::class)
    ->middleware('version')
    ->name('docs');

Route::get('/docs/{version}/{page}', Controllers\Documentation\ShowController::class)
    ->middleware('version')
    ->name('docs.show');

// -----------------------------------------------------------------------------
//  Status
// -----------------------------------------------------------------------------

Route::get('/status', Controllers\Status\IndexController::class)
    ->name('status');

Route::get('/status/{version}', Controllers\Status\ShowController::class)
    ->middleware('version')
    ->name('status.show');

// -----------------------------------------------------------------------------
//  Articles
// -----------------------------------------------------------------------------

Route::get('/articles/{urn}', Controllers\Article\ShowController::class)
    ->name('article');

// -----------------------------------------------------------------------------
//  Test
// -----------------------------------------------------------------------------

if (App::isLocal()) {
    Route::get('/test', Controllers\Test\ShowController::class)
        ->name('test');
}
