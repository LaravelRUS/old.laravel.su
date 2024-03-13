<?php

use App\Docs;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\RedirectToBanPage;
use App\Notifications\GreetNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

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
Route::view('/advertising', 'pages.advertising')->name('advertising');
Route::view('/why-laravel', 'pages.why-laravel')->name('why-laravel');
Route::view('/ecosystem', 'pages.ecosystem')->name('ecosystem');
Route::view('/contributors', 'pages.contributors')->name('contributors');
Route::view('/rules', 'pages.rules')->name('rules');
Route::view('/privacy-policy', 'pages.privacy-policy')->name('privacy-policy');
Route::view('/orchid-admin', 'pages.orchid')->name('orchid');
Route::view('/donate', 'pages.donate')->name('donate');
Route::view('/donate/frame', 'pages.donate-frame')->name('donate.frame');

Route::view('/courses', 'pages.courses')->name('courses');
Route::view('/assets', 'pages.assets')->name('assets');

Route::view('nav', 'pages.navigation')->name('nav');
Route::view('/admin', 'errors.admin');

Route::get('/achievements', [AchievementsController::class, 'index'])->name('achievements');
Route::view('/hangman', 'pages.hangman')->name('hangman');
Route::view('/editor-guide', 'pages.editor-guide')->name('editor-guide');

Route::view('/library/clear-code', 'library.clear-code')->name('library.clear-code');
Route::view('/library/upgrade', 'library.upgrade')->name('library.upgrade');
Route::view('/library/security', 'library.security')->name('library.security');

/*
|--------------------------------------------------------------------------
| Open Quiz
|--------------------------------------------------------------------------
|
| ...
|
*/
Route::get('open', [\App\Http\Controllers\OpenQuizController::class, 'index'])
    ->name('quiz.open');

Route::any('goronich', [\App\Http\Controllers\OpenQuizController::class, 'goronich'])
    ->name('quiz.goronich');

Route::get('/goronich/open/146q447w424c', function (Request $request) {
    $request->user()->reward(\App\Achievements\Events\OpeningWebSite::class);

    return \route('home');
})
    ->middleware('auth')
    ->name('quiz.login');

/*
|--------------------------------------------------------------------------
| Post/Feed Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/feed', [PostController::class, 'feed'])
    ->name('feed');

Route::post('/feed', [PostController::class, 'feed'])
    ->name('feed.popular');

Route::get('/posts', [PostController::class, 'list'])
    ->name('posts');

Route::get('/p/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');

Route::middleware(['auth', RedirectToBanPage::class])
    ->group(function () {

        Route::get('/posts/create', [PostController::class, 'edit'])
            ->can('create', 'App\Models\Post')
            ->name('post.create');

        Route::post('/posts/create', [PostController::class, 'update'])
            ->can('create', 'App\Models\Post')
            ->name('post.store');

        Route::post('/posts/preview', [PostController::class, 'preview'])
            ->can('create', 'App\Models\Post')
            ->name('post.preview');

        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
            ->can('update', 'post')
            ->name('post.edit');

        Route::post('/posts/{post}', [PostController::class, 'update'])
            ->can('update', 'post')
            ->name('post.update');

        Route::delete('/posts/{post}', [PostController::class, 'delete'])
            ->can('delete', 'post')
            ->name('post.delete');
    });

/*
|--------------------------------------------------------------------------
| Positions/Jobs Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/jobs', [\App\Http\Controllers\PositionsController::class, 'jobs'])
    ->name('jobs');

Route::get('/positions', [\App\Http\Controllers\PositionsController::class, 'list'])
    ->name('positions');
Route::get('/positions/latest', [\App\Http\Controllers\PositionsController::class, 'latest'])
    ->name('positions.latest');

Route::get('/jobs/{position:slug}', [\App\Http\Controllers\PositionsController::class, 'show'])
    ->name('position.show');

Route::middleware(['auth', RedirectToBanPage::class])
    ->group(function () {

        Route::get('/positions/create', [\App\Http\Controllers\PositionsController::class, 'edit'])
            ->can('create', 'App\Models\Position')
            ->name('position.create');

        Route::post('/positions', [\App\Http\Controllers\PositionsController::class, 'update'])
            ->can('create', 'App\Models\Position')
            ->name('position.store');

        Route::get('/positions/{position}/edit', [\App\Http\Controllers\PositionsController::class, 'edit'])
            ->can('update', 'position')
            ->name('position.edit');

        Route::post('/positions/{position}', [\App\Http\Controllers\PositionsController::class, 'update'])
            ->can('update', 'position')
            ->name('position.update');

        Route::delete('/positions/{position}', [\App\Http\Controllers\PositionsController::class, 'delete'])
            ->can('delete', 'position')
            ->name('position.delete');
    });
/*
|--------------------------------------------------------------------------
| Comments Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/comments/article/{post}', [CommentsController::class, 'show'])
    ->name('post.comments');

Route::middleware(['auth'])
    ->prefix('comments')
    ->group(function () {
        Route::post('/', [CommentsController::class, 'store'])
            ->name('comments.store');

        Route::post('/{comment}', [CommentsController::class, 'reply'])
            ->name('comments.reply');

        Route::put('/{comment}', [CommentsController::class, 'update'])
            ->can('update', 'comment')
            ->name('comments.update');

        Route::delete('/{comment}', [CommentsController::class, 'delete'])
            ->can('delete', 'comment')
            ->name('comments.delete');

        Route::post('/{comment}/reply', [CommentsController::class, 'showReply'])->name('comments.show.reply');
        Route::post('/{comment}/edit', [CommentsController::class, 'showEdit'])
            ->can('update', 'comment')
            ->name('comments.show.edit');
    });

/*
|--------------------------------------------------------------------------
| Meets Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/meets', [MeetController::class, 'index'])->name('meets');

Route::middleware(['auth', RedirectToBanPage::class])
    ->prefix('meets')
    ->group(function () {
        Route::get('/create', [MeetController::class, 'edit'])
            ->can('create', 'App\Models\Meet')
            ->name('meets.create');

        Route::post('/', [MeetController::class, 'update'])
            ->can('create', 'App\Models\Meet')
            ->name('meets.store');

        Route::get('/{meet}/edit', [MeetController::class, 'edit'])
            ->can('update', 'meet')
            ->name('meets.edit');

        Route::post('/{meet}', [MeetController::class, 'update'])
            ->can('update', 'meet')
            ->name('meets.update');

        Route::delete('/{meet}', [MeetController::class, 'delete'])
            ->can('delete', 'meet')
            ->name('meets.delete');
    });

/*
|--------------------------------------------------------------------------
| Packages Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/packages', [PackagesController::class, 'index'])->name('packages');

Route::get('/packages/latest', [PackagesController::class, 'latest'])
    ->name('packages.latest');

Route::middleware(['auth', RedirectToBanPage::class])
    ->prefix('packages')
    ->group(function () {
        Route::get('/create', [PackagesController::class, 'edit'])
            ->can('create', 'App\Models\Package')
            ->name('packages.create');

        Route::post('/', [PackagesController::class, 'update'])
            ->can('create', 'App\Models\Package')
            ->name('packages.store');

        Route::get('/{package}/edit', [PackagesController::class, 'edit'])
            ->can('update', 'package')
            ->name('packages.edit');

        Route::post('/{package}', [PackagesController::class, 'update'])
            ->can('update', 'package')
            ->name('packages.update');

        Route::delete('/{package}', [PackagesController::class, 'delete'])
            ->can('delete', 'package')
            ->name('packages.delete');
    });

/*
|--------------------------------------------------------------------------
| Challenges Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/challenges', [ChallengesController::class, 'index'])
    ->name('challenges');

Route::get('/challenges/past', [ChallengesController::class, 'past'])
    ->name('challenges.past');

Route::middleware(['auth', RedirectToBanPage::class])
    ->prefix('challenges')
    ->group(function () {
        Route::get('/registration', [\App\Http\Controllers\ChallengesController::class, 'edit'])
            ->can('create', 'App\Models\ChallengeApplication')
            ->name('challenges.registration');

        Route::post('/registration', [\App\Http\Controllers\ChallengesController::class, 'update'])
            ->can('create', 'App\Models\ChallengeApplication')
            ->name('challenges.registration.save');
    });

/*
|--------------------------------------------------------------------------
| Laravel IDEA Routes
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::middleware(['auth', RedirectToBanPage::class])
    ->group(function () {
        Route::get('/idea', [\App\Http\Controllers\IdeaController::class, 'index'])->name('idea.index');
        Route::post('/idea', [\App\Http\Controllers\IdeaController::class, 'store'])->name('idea.store');
        Route::get('/idea/{key}', [\App\Http\Controllers\IdeaController::class, 'key'])
            ->can('owner', 'key')
            ->name('idea.key');
    });

/*
|--------------------------------------------------------------------------
| User-Like Routes
|--------------------------------------------------------------------------
|
| This section contains the web routes related to user likes.
| These routes handle setting/unsetting likes for different entities.
|
*/

Route::middleware('auth')
    ->prefix('like')
    ->group(function () {
        Route::post('/post/{post}', [LikeController::class, 'togglePost'])
            ->name('like.post');

        Route::post('/comment/{comment}', [LikeController::class, 'toggleComment'])
            ->name('like.comment');
    });

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| This section contains the web routes related to authentication.
| These routes handle user authentication and logout processes.
|
*/

Route::view('/login', 'auth.login')->middleware('guest')->name('login');
Route::get('/auth/login', [AuthController::class, 'login'])->middleware('guest')->name('auth.login');
Route::get('/auth/callback', [AuthController::class, 'callback'])->name('auth.callback')->middleware('guest');
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Documentation Routes
|--------------------------------------------------------------------------
|
| This section contains the web routes for accessing the documentation.
| The routes handle redirects, display documentation pages, and provide related data.
|
*/
Route::view('/documentation-contribution-guide', 'docs.contribution')
    ->name('documentation-contribution-guide');

Route::redirect('/docs/', '/docs/'.Docs::DEFAULT_VERSION);

Route::get('/status/{version?}', [DocsController::class, 'status'])
    ->whereIn('version', Docs::SUPPORT_VERSIONS)
    ->name('status');

Route::get('/docs/{version?}/{page?}', [DocsController::class, 'show'])
    ->whereIn('version', Docs::SUPPORT_VERSIONS)
    ->name('docs');

Route::get('/docs/{page}', fn (string $page) => redirect()->route('docs', ['version' => Docs::DEFAULT_VERSION, 'page' => $page]));

Route::get('nav/docs/{version?}', [DocsController::class, 'navigation'])
    ->whereIn('version', Docs::SUPPORT_VERSIONS)
    ->name('nav.docs');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
|
| TODO:
|
*/

Route::get('/user/{nickname}', function ($nickname) {
    return $nickname;
})->name('user.show');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])
    ->middleware('auth')
    ->name('my');

Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('my.edit');

Route::post('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('my.update');

Route::get('/profile/notifications', [\App\Http\Controllers\NotificationsController::class, 'index'])
    ->middleware('auth')
    ->name('profile.notifications');

Route::post('/profile/notifications', [\App\Http\Controllers\NotificationsController::class, 'readAll'])
    ->middleware('auth')
    ->name('profile.notifications.read.all');

Route::get('/profile/notifications/{id}', [\App\Http\Controllers\NotificationsController::class, 'read'])
    ->middleware('auth')
    ->name('profile.notifications.read');

Route::get('/@{user:nickname}', [\App\Http\Controllers\ProfileController::class, 'show'])
    ->name('profile');

Route::get('/@{user:nickname}/packages', [\App\Http\Controllers\ProfileController::class, 'packages'])
    ->name('profile.packages');

Route::get('/@{user:nickname}/comments', [\App\Http\Controllers\ProfileController::class, 'comments'])
    ->name('profile.comments');

Route::get('/@{user:nickname}/awards', [\App\Http\Controllers\ProfileController::class, 'awards'])
    ->name('profile.awards');

Route::get('/@{user:nickname}/meets', [\App\Http\Controllers\ProfileController::class, 'meets'])
    ->name('profile.meets');

/*
|--------------------------------------------------------------------------
| Pastebin
|--------------------------------------------------------------------------
*/

Route::get('/pastebin/{snippet?}', [\App\Http\Controllers\CodeSnippetController::class, 'show'])->name('pastebin');
Route::post('/pastebin', [\App\Http\Controllers\CodeSnippetController::class, 'store'])->name('pastebin.store');

/*
|--------------------------------------------------------------------------
| Push Notification
|--------------------------------------------------------------------------
*/

Route::post('/push', [\App\Http\Controllers\PushController::class, 'store'])->name('push.store');
Route::post('/push/unsubscribe', [\App\Http\Controllers\PushController::class, 'unsubscribe'])->name('push.unsubscribe');
Route::post('/push/check', [\App\Http\Controllers\PushController::class, 'check'])->name('push.check');

/*
|--------------------------------------------------------------------------
| PWA/iOS Manifest
|--------------------------------------------------------------------------
*/

Route::get('/manifest.json', fn () => response()->json(config('site.pwa')))
    ->middleware('cache.headers:public;max_age=300;etag')
    ->name('manifest');

Route::get('/cover.jpg', [\App\Http\Controllers\CoverController::class, 'image'])
    ->middleware(['cache.headers:public;max_age=300;etag', 'throttle:60,10'])
    ->name('cover');

/*
|--------------------------------------------------------------------------
| RSS Feed
|--------------------------------------------------------------------------
|
| This section contains the web routes for the RSS feed.
| The routes handle the display of the RSS feed and provide related data.
|
*/

Route::get('/rss/feed', [\App\Http\Controllers\FeedController::class, 'index'])
    ->middleware(['cache.headers:public;max_age=300;etag'])
    ->name('feeds.rss');

/*
|--------------------------------------------------------------------------
| Quiz
|--------------------------------------------------------------------------
|
|
*/

Route::get('/test', function (Request $request) {
    Notification::send($request->user(), new GreetNotification());
});

Route::get('/quiz', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz');

Route::post('stream/quiz/start', [\App\Http\Controllers\QuizController::class, 'startQuiz'])->name('stream.quiz.start');
Route::post('stream/quiz/set-answer', [\App\Http\Controllers\QuizController::class, 'setAnswer'])->name('stream.quiz.set-answer');
Route::post('stream/quiz/next', [\App\Http\Controllers\QuizController::class, 'next'])->name('stream.quiz.next');
