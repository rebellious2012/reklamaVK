<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        $blogs = Cache::rememberForever('recent_blogs', function () {
            return Blog::where('status', 'published')->orderBy('created_at', 'desc')->take(4)->get();
        });
        return view('welcome', compact('blogs'));
    }
}
