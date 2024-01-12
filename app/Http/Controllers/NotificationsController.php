<?php

namespace App\Http\Controllers;

use App\Casts\PostTypeEnum;
use App\Models\Comment;
use App\Models\IdeaKey;
use App\Models\Post;
use App\Models\User;
use App\Notifications\IdeaRequestAcceptedNotification;
use App\Notifications\NewRelease;
use App\Notifications\ReplyCommentNotification;
use Esplora\Tracker\Facades\Tracker;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    public function index(Request $request)
    {
        $notifications = $request->user()
            ->notifications()
            ->orderBy('created_at')
            ->cursorPaginate(5);

        return view('profile.notifications', [
            'notifications' => $notifications,

        ]);
    }


    /**
     * @param string                   $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
     */
    public function read(string $id, Request $request)
    {
        $notification = $request->user()
            ->notifications()
            ->where('id', $id)
            ->firstOrFail();

        $notification->markAsRead();

        $url = $notification->data['action'] ?? route('home');

        return view('pages.redirection', [
            'link' => $url,
        ]);
    }

    public function readAll(Request $request)
    {
        $request->user()
            ->unreadNotifications()
            ->update(['read_at' => now()]);


        return redirect()->back();
    }
}
