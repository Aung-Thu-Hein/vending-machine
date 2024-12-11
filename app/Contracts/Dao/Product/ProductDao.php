<?php

namespace App\Contracts\Dao\Product;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;

interface ProductDao
{
    /**
     * get products with pagination, default 10
     *
     * @return LengthAwarePaginator
     */
    public function getProducts(): LengthAwarePaginator;

    /**
     * store a product record
     *
     * @param array $model
     * @return Product
     */
    public function create(array $model): Product;

    /**
     * get a product
     *
     * @param $id
     * @return Product
     */
    public function getProductById($id): Product;

    /**
     * update a product record
     *
     * @param $id
     * @param array $model
     * @return bool|int
     */
    public function updateProductById($id, array $model): bool|int;

    /**
     * delete a product record
     *
     * @param $id
     * @return bool|null
     */
    public function deleteProductById($id): bool|null;
}
