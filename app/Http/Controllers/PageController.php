<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Butschster\Head\Facades\Meta;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::with(['tags'])
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
            ->withQueryString();

        // For SEO
        $title = 'Home';
        $description = 'Mi chiamo Andrea Falcon e sono uno sviluppatore Web Full-Stack. Ho deciso di creare questo blog per tener traccia delle tecnologie e conoscenze che apprendo durante la mia formazione.';
        if (Request::input('tag')) {
            $title = Request::input('tag');
            $description = 'Ecco qua i miei post relativi al tag ' . $title;
        } elseif (Request::input('search')) {
            $title = Request::input('search');
            $description = 'Ecco qua i miei post relativi alla tua ricerca relativa a ' . $title;
        }
        Meta::setTitle($title . ' - AndreaFalcon.dev')
           ->setDescription($description)
           ->setPaginationLinks($posts);

        return inertia('Home', [
            'filters' => Request::only(['search', 'tag']),
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = Post::with(['tags'])
            ->where('slug', $slug)
            ->firstOrFail();

        // For SEO
        Meta::setTitle($post->seo_title . ' - AndreaFalcon.dev')
           ->setDescription($post->seo_description);

        // Fix Pre tag for highlight in front-end
        $post->text = str_replace(['<pre>'], ['<pre class="language-html">'], Str::of($post->text)->markdown());
        return inertia('Post', [
            'post' => $post,
        ]);
    }
}
