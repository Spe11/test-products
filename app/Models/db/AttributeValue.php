<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Значение аттрибута товара
 *
 * @property int    $id
 * @property int    $product_id
 * @property int    $attribute_id
 * @property string $value
 *
 * @property-read Attribute $attribute Аттрибут
 */
class AttributeValue extends Model
{
    public $timestamps = false;

    protected $table = 'attribute_value';

    /**
     * @return BelongsTo
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
