<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', '=', 1)->get();
        return PostResource::collection($posts);
    }

    public function show($post)
    {
        try {
            $post = Post::findOrFail($post);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }
        return new PostResource($post);
    }
}
