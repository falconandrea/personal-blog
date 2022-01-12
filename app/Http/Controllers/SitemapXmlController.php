<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{
    public function index()
    {
        $posts = Post::all()->where('published', 1)->sortByDesc('updated_at');

        return response()->view('sitemap', [
            'indexTimestamp' => $posts->first()->updated_at->tz('UTC')->toAtomString(),
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }
}
