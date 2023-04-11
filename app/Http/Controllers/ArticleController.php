<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleFilterRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $paginator = Post::with('tags')->simplePaginate(5);
        return view('article.index', [
            'paginator'=>$paginator
        ]);
    }

    public function read(string $slug, Post $id): View | RedirectResponse
    {
        $post = $id;
        if ($slug != $post->slug) {
            return to_route('article.read', ['slug'=>$post->slug,'id'=>$post->id]);
        }
        return view('article.read', [
            'article'=>$post
        ]);
    }

    public function redirect(Post $id): RedirectResponse
    {
        $post = $id;
        return to_route('article.read', ['slug'=>$post->slug,'id'=>$post->id]);
    }
}
