<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\CustomModel;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Product::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveProducts($columns = ['id','name']): Collection
    {
        return Product::active()
            ->get($columns);
    }

    /**
     * @return Product
     */
    public static function store($arrayProduct): Product
    {
        return Product::create($arrayProduct);
    }

    /**
     * @return bool
     */
    public static function update($arrayProduct, $product): bool
    {
        return $product->update($arrayProduct);
    }

    /**
     * @return bool
     */
    public static function disable($arrayProduct, $product): bool
    {
        return $product->update($arrayProduct);
    }

    /**
     * @return bool
     */
    public static function enable($arrayProduct, $product): bool
    {
        return $product->update($arrayProduct);
    }

    /**
     * @return Collection
     */
    public static function getActiveProductListWithCategory() : Collection
    {
        return Product::select(
            ''
        )
        ->join('category', 'product.idCategory', '=', 'category.idCategory')
        ->where('product.statusCategory', CustomModel::RECORD_STATUS_ACTIVE);
    }

}
