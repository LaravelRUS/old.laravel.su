<?php

use App\Application\Http\Controllers\Web;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

// -----------------------------------------------------------------------------
//  Home
// -----------------------------------------------------------------------------

Route::get('/', Web\Home\ShowController::class)
    ->name('home');

// -----------------------------------------------------------------------------
//  Documentation
// -----------------------------------------------------------------------------

Route::get('/docs/{version?}', Web\Documentation\IndexController::class)
    ->middleware('version')
    ->name('docs');

Route::get('/docs/{version}/{page}', Web\Documentation\ShowController::class)
    ->middleware('version')
    ->name('docs.show');

// -----------------------------------------------------------------------------
//  Status
// -----------------------------------------------------------------------------

Route::get('/status', Web\Status\IndexController::class)
    ->name('status');

Route::get('/status/{version}', Web\Status\ShowController::class)
    ->middleware('version')
    ->name('status.show');

// -----------------------------------------------------------------------------
//  Articles
// -----------------------------------------------------------------------------

Route::get('/articles/{urn}', Web\Article\ShowController::class)
    ->name('article');

// -----------------------------------------------------------------------------
//  Test
// -----------------------------------------------------------------------------

if (App::isLocal()) {
    Route::get('/test', Web\Test\ShowController::class)
        ->name('test');
}
