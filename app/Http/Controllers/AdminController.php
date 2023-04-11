<?php

namespace App\Http\Controllers;

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
            'articles'=>Post::all()
        ]);
    }
}
