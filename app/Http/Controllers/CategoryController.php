<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\BO\CategoryBO;

class CategoryController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $categoryBO = new CategoryBO();
        $categories = $categoryBO->initialize();

        return CategoryResource::collection($categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryBO = new CategoryBO();
        $categories = $categoryBO->index();

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $categoryBO = new CategoryBO();
        $category = $categoryBO->store($request);

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        dd($category->product);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $categoryBO = new CategoryBO();
        $updated = $categoryBO->update($request, $category);

        if ($updated)
        {
            return new CategoryResource($category);
        }
        return response()->json([], 202);
    }

    /**
     * disable specific category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function disable(Category $category)
    {
        $categoryBO = new CategoryBO();
        $categoryBO->disable($category);

        return response()->json("Category Disabled", 204);
    }

    /**
     * enable specific category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function enable(Category $category)
    {
        $categoryBO = new CategoryBO();
        $categoryBO->enable($category);

        return response()->json("Category Enable", 204);
    }
}
