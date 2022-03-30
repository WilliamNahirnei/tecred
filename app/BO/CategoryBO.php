<?php

namespace App\BO;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\BO\Traits\CategoryTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryBO
{
    use CategoryTrait;

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
        return CategoryRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveCategories(): Collection
    {
        return CategoryRepository::findActiveCategories();
    }

    /**
     * Store a new resource in storage
     *
     * @param Request  $request
     * @return Category
     */
    public function store(Request $request): Category
    {
        $preparedData = $this->prepare($request);
        return CategoryRepository::store($preparedData);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\CategoryRequest  $request
     * @param \App\Models\Category  $category
     * @return bool
     */
    public function update($request, $category): bool
    {
        $preparedData = $this->prepare($request);
        return CategoryRepository::update($preparedData, $category);
    }

    /**
     * disable specific category.
     *
     * @param \App\Models\Category  $category
     * @return bool
     */
    public function disable($category): bool
    {
        $preparedData = $this->prepare();
        return CategoryRepository::disable($preparedData, $category);
    }
}
