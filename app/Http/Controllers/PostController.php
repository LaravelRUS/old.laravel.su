<?php

namespace App\Http\Controllers;

use App\Casts\PostTypeEnum;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Response;
use  Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View|\Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse|\Tonysm\TurboLaravel\Http\PendingTurboStreamResponse|null
     */
    public function feed()
    {
        $popular = Post::withCount('likers')
            ->withCount('comments')
            ->orderBy('likers_count', 'desc')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(5);//CursorPaginate не работает с сортировкой по полю из withCount


        if (request()->isMethod('GET')) {
            return view('post.list', [
                'popular' => $popular,
            ]);
        }

        return turbo_stream([
            turbo_stream()->append('popular-list', view('post._popular_list', [
                'popular' => $popular,
            ])),

            turbo_stream()->replace('popular-more', view('post._popular_pagination', [
                'popular' => $popular,
            ])),
        ]);
    }


    /**
     * @param \App\Models\Post $post
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        $post->load(['comments', 'author'])
            ->loadCount('comments')
            ->loadCount('likers');

        return view('post.show', [
            'post' => $post,
        ]);
    }

    public function edit(Request $request, Post $post)
    {
        $this->authorize('isOwner', $post);

        return view('post.edit', [
            'post'      => $post,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post         $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

        return redirect()->route('post.show', $post);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post         $post
     *
     * @return \Tonysm\TurboLaravel\Http\MultiplePendingTurboStreamResponse|\Tonysm\TurboLaravel\Http\PendingTurboStreamResponse
     */
    public function delete(Request $request, Post $post)
    {
        $this->authorize('isOwner', $post);

        $post->delete();
        //сюда поставить уведомление

        return turbo_stream()->remove($post);
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function list(Request $request)
    {
        $posts = Post::with(['author'])
            ->withCount('comments')
            ->withCount('likers')
            ->when($request->has('user_id'), fn(Builder $query) => $query->where('user_id', $request->get('user_id')))
            ->orderBy('id', 'desc')
            ->cursorPaginate(3);

        $posts = $request->user()->attachLikeStatus($posts);

        return turbo_stream([
            turbo_stream()->removeAll('.post-placeholder'),
            turbo_stream()->append('posts-frame', view('particles.posts.list', [
                'posts' => $posts,
            ])),

            turbo_stream()->replace('post-more', view('post.pagination', [
                'posts' => $posts,
            ])),
        ]);
    }

}
