<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Docs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'pages.welcome')->name('home');
Route::view('/feature', 'pages.feature')->name('feature');
Route::view('/discussion', 'pages.discussion')->name('discussion');
//Route::view('/post', 'pages.post')->name('post');
Route::view('/status', 'pages.status')->name('status');
Route::view('/profile', 'pages.profile')->name('profile');
Route::view('/advertising', 'pages.advertising')->name('advertising');
Route::view('/resources', 'pages.resources')->name('resources');
Route::view('/meets', 'pages.meets')->name('meets');

Route::redirect('/docs/', '/docs/' . Docs::DEFAULT_VERSION);

Route::get('/docs/{version}/{page?}', function (string $version, string $page = 'installation') {
    $docs = new \App\Docs($version, $page);

    $menu  = $docs->getMenu();
    $title = $docs->title();
    $text = $docs->view('particles.docs');
    $originalLink = $docs->goToOriginal();

    return view('pages.docs', [
        'text'         => $text,
        'menu'         => $menu,
        'title'        => $title,
        'originalLink' => $originalLink,
    ]);
})->whereIn('version', Docs::SUPPORT_VERSION)
    ->name('docs');

Route::get('/posts',[PostController::class,'list'])->name('post');
Route::post('/posts',[PostController::class,'more'])->name('post.load-more');

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/posts/edit/{post?}',[PostController::class,'edit'])->name('post.edit');
        Route::post('/posts/edit/{post?}',[PostController::class,'update'])->name('post.update');
    });
/*
|--------------------------------------------------------------------------
| Auth Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/auth/redirect', fn() => Socialite::driver('github')
    ->scopes(['read:user'])
    ->redirect())->name('login');

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = \App\Models\User::updateOrCreate([
        'github_id' => $githubUser->getId(),
    ], [
        'name'     => $githubUser->getName(),
        'email'    => $githubUser->getEmail(),
        'avatar'   => $githubUser->getAvatar(),
        'nickname' => $githubUser->getNickname(),
    ]);

    \Illuminate\Support\Facades\Auth::login($user, true);

    return redirect()->route('home');
});

Route::post('/logout', function (Request $request) {
    \Illuminate\Support\Facades\Auth::logout();

    $request->session()->flush();

    return redirect()->route('home');
})->name('logout');
