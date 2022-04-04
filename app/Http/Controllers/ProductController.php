<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\BO\ProductBO;

class ProductController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $productBO = new ProductBO();
        $products = $productBO->initialize();

        return ProductResource::collection($products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productBO = new ProductBO();
        $products = $productBO->index();

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $productBO = new ProductBO();
        $product = $productBO->store($request);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Export report with active products data
     *
     */
    public function exportCsvActiveProducts()
    {
        $productBO = new ProductBO();
        return $productBO->exportCsvActiveProducts();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $productBO = new ProductBO();
        $updated = $productBO->update($request, $product);

        if ($updated)
        {
            return new ProductResource($product);
        }
        return response()->json([], 202);
    }

    /**
     * disable specific product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function disable(Product $product)
    {
        $categoryBO = new ProductBO();
        $categoryBO->disable($product);

        return response()->json("Category Disabled", 204);
    }

    /**
     * enable specific product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function enable(Product $product)
    {
        $categoryBO = new ProductBO();
        $categoryBO->enable($product);

        return response()->json("Category Enable", 204);
    }
}
