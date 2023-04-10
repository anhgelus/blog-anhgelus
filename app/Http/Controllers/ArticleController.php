<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return Post::simplePaginate(5);
    }
}
