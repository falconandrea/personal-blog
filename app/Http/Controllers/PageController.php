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
        $post = Post::with(['tags'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Fix Pre tag for highlight in front-end
        $post->text = str_replace(['<pre class="ql-syntax" spellcheck="false">', '</pre>'], ['<pre class="language-html"><code>', '</code></pre>'], $post->text);
        return inertia('Post', [
            'post' => $post,
        ]);
    }
}
