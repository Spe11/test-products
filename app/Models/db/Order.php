<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Заказ
 *
 * @property int    $id
 * @property int    $product_id
 * @property int    $count
 * @property float  $total
 *
 * @property-read Product $product Товар
 */
class Order extends Model
{
    public $timestamps = false;

    protected $table = 'order';

    protected $casts = [
        'total' => 'float(8,2)',
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
