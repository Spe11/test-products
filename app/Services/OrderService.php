<?php

namespace App\Services;

use App\Models\db\Order;
use App\Models\db\Product;

/**
 * Сервис управления заказами
 *
 */
class OrderService
{
    /**
     * Добавить
     *
     * @param Product $product
     * @param int     $count
     *
     * @return void
     */
    public function add(Product $product, int $count)
    {
        $order             = new Order;
        $order->product_id = $product->id;
        $order->count      = $count;
        $order->total      = $product->cost * $count;

        $order->save();
    }

    /**
     * Редактировать
     *
     * @param Order   $product
     * @param Product $product
     * @param int     $count
     *
     * @return void
     */
    public function update(Order $order, Product $product, int $count)
    {
        $order->product_id = $product->id;
        $order->count      = $count;
        $order->total      = $count * $product->cost;

        $order->save();
    }

    /**
     * Удалить
     *
     * @param Order $order
     *
     * @return void
     */
    public function delete(Order $order)
    {
        $order->delete();
    }
}
