<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Request;

class PageController extends Controller
{
    public function index()
    {
        return inertia('Home', [
            'filters' => Request::only(['search', 'tag']),
            'posts' => Post::with(['tags'])
                ->latest()
                ->where('published', 1)
                ->when(Request::input('tag'), function ($query, $tag) {
                    return $query->whereHas('tags', function ($query) use ($tag) {
                        $query->where("slug", $tag);
                    });
                })
                ->when(Request::input('search'), function ($query, $search) {
                    return $query->where('title', 'LIKE', "%{$search}%")->orWhere('text', 'LIKE', "%{$search}%");
                })
                ->paginate(5)
                ->withQueryString(),
        ]);
    }

    public function show($slug)
    {
        return inertia('Post', [
            'post' => Post::with(['tags'])
                ->where('slug', $slug)
                ->firstOrFail(),
        ]);
    }
}
