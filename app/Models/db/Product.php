<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Товар
 *
 * @property int    $id
 * @property string $name
 * @property float  $cost
 *
 * @property-read Attribute[]      $attributes      Аттрибуты
 * @property-read AttributeValue[] $attributeValues Значения атрибутов
 */
class Product extends Model
{
    public $timestamps = false;

    protected $table = 'product';

    protected $casts = [
        'cost' => 'float(8,2)',
    ];

    /**
     * @return HasMany
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }

    /**
     * @return HasMany
     */
    public function attributeValues(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
}
