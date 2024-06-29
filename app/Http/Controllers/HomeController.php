<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featuredPosts = Post::published()
            ->featured()
            ->with('author', 'categories')
            ->latest('published_at')
            ->take(1)
            ->get();

        $latestPosts = Post::published()
            ->with('author', 'categories')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('welcome', [
            'featuredPosts' => $featuredPosts,
            'latestPosts' => $latestPosts,
        ]);
    }
}
