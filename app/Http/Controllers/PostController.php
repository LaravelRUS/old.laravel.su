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
    public $action = "append";

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|null
     */
    public function feed()
    {
        $popular = Post::withCount('likers')
            ->withCount('comments')
            ->orderBy('likers_count', 'desc')
            ->orderBy('created_at', 'desc')
            ->cursorPaginate(5);

        return view('post.list', [
            'popular' => $popular,
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

    public function edit(Request $request,Post $post)
    {
        $this->authorize('isOwner', $post);

        $request->validate([
            'select_type'    => [
                'sometimes',
                Rule::enum(PostTypeEnum::class)
            ]
        ]);

         $isEditing = $post->exists;
         if($request->has('select_type') && !$isEditing){
             $post->type = PostTypeEnum::from($request->input('select_type'));
             $view = 'post.edit.'. $request->input('select_type');
         }elseif($isEditing){
             $view = 'post.edit.'. $post->type->value;

         }else{
             $view = 'post.edit.'.PostTypeEnum::Article->value;
         }

        $title = $isEditing ? 'Редактирование' : 'Новая статья';
        return view($view, [
            'title' => $title,
            'post'  => $post,
            'isEditing' => $isEditing
        ])->fragmentsIf(!$request->isMethodSafe());
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('isOwner', $post);

        $request->validate([
            'title'   => 'required|string',
            'content' => 'required|string',
            'type'    => [
                $post->exists ? 'missing' : 'required',
                Rule::enum(PostTypeEnum::class)
            ]
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
        $posts = Post::with(['author'])
            ->withCount('comments')
            ->withCount('likers')
            ->when($request->has('user_id'), fn(Builder $query) => $query->where('user_id', $request->get('user_id')))
            ->orderBy('id', 'desc')
            ->cursorPaginate(3);

        $posts = $request->user()->attachLikeStatus($posts);

        /*
        return view('particles.posts.list', [
            'posts'       => $posts,
            'isMyProfile' => $request->has('user_id') && $request->user()?->id == $request->get('user_id'),
            'action'      => $this->action
        ])->fragmentsIf(!$request->isMethodSafe());
        */

        return turbo_stream([
            turbo_stream()->removeAll('.post-placeholder'),
            turbo_stream()->append('posts-frame', view('particles.posts.list', [
                'posts'       => $posts,
                'isMyProfile' => $request->has('user_id') && $request->user()?->id == $request->get('user_id'),
                'action'      => $this->action,
            ])),

            turbo_stream()->replace('post-more', view('post.pagination', [
                'posts'       => $posts,
            ])),
        ]);
    }

}
