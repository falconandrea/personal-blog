<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::where('published', 1)
            ->when($request->has('tag') && $request->input('tag') != '', function ($query, $tag) {
                return $query->whereHas('tags', function ($query) use ($tag) {
                    $query->where("slug", $tag);
                });
            })
            ->when($request->has('search') && $request->input('search') != '', function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")->orWhere('text', 'LIKE', "%{$search}%");
            })
            ->latest();

        return PostResource::collection($posts->get());
    }

    public function show($slug)
    {
        try {
            $post = Post::where('slug', $slug)->first();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }
        return new PostResource($post);
    }
}
