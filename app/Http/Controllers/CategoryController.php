<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Status;

class CategoryController extends Controller
{
    /**
     * get list of all categories
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();

        return CategoryResource::collection($categories)->response()->setStatusCode(Status::HTTP_OK);
    }

    /**
     * Store a new category
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $attributes = $request->validate([
            'slug' => 'required|string|max:255|unique:categories',
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($attributes);

        return (new CategoryResource($category))->response()->setStatusCode(Status::HTTP_CREATED);
    }

    /**
     * show the specified category.
     *
     * @param  \App\Models\Category  $category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category): JsonResponse
    {
        return (new CategoryResource($category))->response()->setStatusCode(Status::HTTP_OK);
    }

    /**
     * Edit category details
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Category $category): JsonResponse
    {
        $attributes = $request->validate([
            'slug' => 'sometimes|string|max:255|unique:categories',
            'name' => 'sometimes|string|max:255',
        ]);

        $category->update($attributes);

        return (new CategoryResource($category))->response()->setStatusCode(Status::HTTP_ACCEPTED);
    }

    /**
     * delete specified category.
     *
     * @param  \App\Models\Category  $category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return (new CategoryResource($category))->response()->setStatusCode(Status::HTTP_NO_CONTENT);
    }
}
