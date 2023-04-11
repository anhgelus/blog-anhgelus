<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewArticleRequest;
use App\Http\Requests\NewTagRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function index(): View | RedirectResponse
    {
        return view('admin.overview');
    }

    public function article(): View
    {
        $stats = [
        'post_total' => Post::count(),
        'tag_total' => Tag::count()
        ];
        return view('admin.article', [
            'stats'=>$stats,
            'articles'=>Post::latest()->get()
        ]);
    }

    public function new(): View
    {
        return view('admin.article.new', [
            'tags'=>Tag::all()
        ]);
    }

    public function store(NewArticleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Post::create([
            'title'=>$data['title'],
            'content'=>$data['content'],
            'slug'=>$data['slug'],
        ])->tags()->sync($data['tags']);
        return to_route('admin.article')->with('success', 'Article créé!');
    }

    public function tags(): View
    {
        $stats = [
            'post_total' => Post::count(),
            'tag_total' => Tag::count()
        ];
        return view('admin.tags', [
            'tags'=>Tag::all(),
            "stats"=>$stats
        ]);
    }

    public function newTag(): View
    {
        return view('admin.tags.new');
    }

    public function storeTag(NewTagRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Tag::create([
            'name'=>$data['name'],
            'description'=>$data['description'],
        ]);
        return to_route('admin.tags')->with('success', 'Tag créé!');
    }
}
