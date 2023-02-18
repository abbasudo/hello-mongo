<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Status;

class PostController extends Controller
{
    /**
     * get list of all posts
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = Post::all();

        return PostResource::collection($posts)->response()->setStatusCode(Status::HTTP_OK);
    }

    /**
     * Store a new post
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $attributes = $request->validate([
            'slug'  => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        $post = Post::create($attributes);

        return (new PostResource($post))->response()->setStatusCode(Status::HTTP_CREATED);
    }
}
