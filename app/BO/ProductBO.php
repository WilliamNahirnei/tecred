<?php

namespace App\BO;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\BO\Traits\ProductTrait;
use App\Models\Product;
use App\Services\CSVService;

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
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\ProductRequest  $request
     * @return Product
     */
    public function store($request): Product
    {
        $preparedData = $this->prepare($request);
        return ProductRepository::store($preparedData);
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
        $preparedData = $this->prepare($request, $product);
        return ProductRepository::update($preparedData, $product);
    }

    /**
     * disable specific product.
     *
     * @param \App\Models\Product  $product
     * @return bool
     */
    public function disable($product): bool
    {
        $preparedData = $this->prepare();
        return ProductRepository::disable($preparedData, $product);
    }

    /**
     * enable specific product.
     *
     * @param \App\Models\Product  $product
     * @return bool
     */
    public function enable($product): bool
    {
        $preparedData = $this->prepare();
        return ProductRepository::enable($preparedData, $product);
    }

    /**
     * Export report with active products data
     */
    public function exportCsvActiveProducts()
    {
        $columns = [];
        $rows = [];
        $productList = ProductRepository::getActiveProductListWithCategory();
        if ($productList->count() === 0) {
            $rows[] = [
                'Mensagem' => "Nenhum produto encontrado",
            ];
        } else {
            foreach ($productList as $product) {
                $rows[] = [
                    'Category' => $product->category,
                    'Product'  => $product->product,
                    'Quantity' => $product->quantity
                ];
            }
        }

        $csvService = new CSVService('Relat??rio de produtos ativos');
        $csvService->setColumns([
            'Categoria',
            'Produto',
            'Quantidade'
        ]);
        return $csvService->generateFile($rows);
    }
}
