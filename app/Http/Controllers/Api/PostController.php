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
        $posts = Post::where('published', '=', 1);
        if ($request->has('tag') && $request->input('tag') != '') {
            $posts = $posts->whereHas('tags', function (Builder $query) use ($request) {
                $query->where('slug', $request->input('tag'));
            });
        }
        if ($request->has('search') && $request->input('search') != '') {
            $posts = $posts->where('title', 'like', '%' . $request->input('search') . '%')->orWhere('text', 'like', '%' . $request->input('search') . '%');
        }

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
