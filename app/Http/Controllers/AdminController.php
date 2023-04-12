<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewArticleRequest;
use App\Http\Requests\NewTagRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Requests\UpdateTagRequest;
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
        $post = Post::create([
            'title'=>$data['title'],
            'content'=>$data['content'],
            'slug'=>$data['slug'],
        ]);
        if (isset($data['tags']))
            $post->tags()->sync($data['tags']);
        return to_route('admin.article')->with('success', 'Article créé!');
    }

    public function edit(Post $post): View
    {
        return view('admin.article.edit', ['post'=>$post,'tags'=>Tag::all()]);
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return to_route('admin.article')->with('success', 'Article supprimé!');
    }

    public function storeEdit(Post $post, UpdateArticleRequest $request): RedirectResponse
    {
        $post->update($request->validated());
        return to_route('admin.article')->with('success', 'Article modifié!');
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

    public function editTags(Tag $tag)
    {
        return view('admin.tags.edit', ['tag'=>$tag]);
    }

    public function storeEditTags(Tag $tag, UpdateTagRequest $request)
    {
        $tag->update($request->validated());
        return to_route('admin.tags')->with('success', 'Tag modifié!');
    }

    public function deleteTags(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return to_route('admin.tags')->with('success', 'Tag supprimé!');
    }
}
