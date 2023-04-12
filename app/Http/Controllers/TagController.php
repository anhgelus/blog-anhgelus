<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        return view('tag.index', [
            'tags'=>Tag::all()
        ]);
    }

    public function read(string $slug, Tag $tag): View | RedirectResponse
    {
        $sl = Str::slug($tag->name);
        if ($slug != $sl) {
            return to_route('tag.read', ['slug'=>$sl,'tag'=>$tag->id]);
        }
        return view('tag.read', [
            'tag'=>$tag
        ]);
    }

    public function redirect(Tag $tag): RedirectResponse
    {
        $sl = Str::slug($tag->name);
        return to_route('tag.read', ['slug'=>$sl,'tag'=>$tag->id]);
    }
}
