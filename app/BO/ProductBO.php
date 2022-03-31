<?php

namespace App\BO;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\BO\Traits\ProductTrait;
use App\Models\Product;

class ProductBO
{
    use ProductTrait;

    /**
     * Return initialization page data
     *
     * @return Object
     */
    public function initialize(): Object
    {
        // Your code

        return new \stdClass();
    }

    /**
     * Displays a resource's list
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return ProductRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveProducts(): Collection
    {
        return ProductRepository::findActiveProducts();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\ProductRequest  $request
     * @return Product
     */
    public function store($request): Product
    {
        return ProductRepository::store($this->prepare($request));
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\ProductRequest  $request
     * @param \App\Models\Product  $product
     * @return bool
     */
    public function update($request, $product): bool
    {
        return ProductRepository::update($this->prepare($request, $product), $product);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\Product  $product
     * @return bool
     */
    public function destroy($product): bool
    {
        return ProductRepository::destroy($product);
    }
}
