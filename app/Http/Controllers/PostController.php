<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Response;
use  Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public $action = "append";

    /**
     * @param \App\Models\Post $post
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        $post->with('comments');

        return view('post.show', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post): View
    {
        $this->authorize('isOwner', $post);

        $title = $post->exists ? 'Редактирование' : 'Новая статья';
        return view('post.edit', [
            'title' => $title,
            'post'  => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('isOwner', $post);

        $request->validate([
            'title'   => 'required|string',
            'content' => 'required|string',
        ]);

        $post->fill([
            'title'   => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => $request->user()->id,
        ])->save();

        //сюда поставить уведомление

        return redirect()->route('post.edit', $post);//пока сюда
    }

    public function delete(Request $request, Post $post)
    {
        $this->authorize('isOwner', $post);

        $post->delete();
        $this->action = "replace";

        //сюда поставить уведомление

        return $this->list($request);//пока сюда
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function list(Request $request)
    {
        $posts = Post::with(['user'])
            ->withCount('comments')
            ->when($request->has('user_id'), fn(Builder $query) => $query->where('user_id', $request->get('user_id')))
            ->orderBy('id', 'desc')
            ->cursorPaginate(3);

        $test = view('particles.posts.list', [
            'posts'       => $posts,
            'isMyProfile' => $request->has('user_id') && $request->user()?->id == $request->get('user_id'),
            'action'      => $this->action
        ])->fragmentsIf(!$request->isMethodSafe());

        return $test;
    }

}
