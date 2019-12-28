<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function index(String $slug)
    {
        $article = Article::query()
            ->where("slug", $slug)
            ->firstOrFail();
        //dd($article);

        return view("articles/show_article", compact("article"));
    }
}
