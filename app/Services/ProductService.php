<?php

namespace App\Services;

use App\Models\db\Product;

/**
 * Сервис управления товарами
 *
 */
class ProductService
{
    /**
     * Добавить
     *
     * @param string $name
     * @param float  $cost
     *
     * @return void
     */
    public function add(string $name, float $cost)
    {
        $product       = new Product;
        $product->name = $name;
        $product->cost = $cost;

        $product->save();
    }

    /**
     * Редактировать
     *
     * @param Product $product
     * @param string  $name
     * @param float   $cost
     *
     * @return void
     */
    public function update(Product $product, string $name, float $cost)
    {
        $product->name = $name;
        $product->cost = $cost;

        $product->save();
    }

    /**
     * Удалить
     *
     * @param Product $product
     *
     * @return void
     */
    public function delete(Product $product)
    {
        $product->delete();
    }
}
