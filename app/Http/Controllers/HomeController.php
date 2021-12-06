<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return inertia('Home', [
            'posts' => Post::with(['tags'])
                ->latest()
                ->paginate(5)
                ->withQueryString(),
        ]);
    }
}
