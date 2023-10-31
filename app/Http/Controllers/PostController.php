<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function edit(Post $post): View
    {
        //нужно будет проверять аавтора, если пост существует

        $title = $post->exists ? 'Редактирование' :'Новая статья';
        return view('post.edit', [
            'title'             => $title,
            'post'           => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        //нужно проверять аавтора, если пост существует

        $request->validate([
            'title'       => 'required|string',
            'content'     => 'required|string',
        ]);

        $post->fill([
            'title'       => $request->get('title'),
            'content'     => $request->get('content'),
            'user_id'     => $request->user()->id
        ])->save();

        //сюда поставить уведомление

        return redirect()->route('post.edit',$post);//пока сюда
    }

    public function list(Request $request)
    {

        return view('post.list',[
            'posts' => $this->getPosts( $request)
        ]);
    }

    public function more(Request $request)
    {
        $posts = $this->getPosts( $request);
        $view = view('post.list', ['posts'=>$posts])->fragment('post-list');

        return Response::json([
            'view' => $view,
            'url' => $posts->nextPageUrl()
        ]);
    }


    protected function getPosts(Request $request){
        return Post::orderBy('created_at', 'desc')->paginate(2);
    }

}
