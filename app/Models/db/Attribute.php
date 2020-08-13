<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Model;

/**
 * Аттрибут товара
 *
 * @property int    $id
 * @property string $name
 */
class Attribute extends Model
{
    public $timestamps = false;

    protected $table = 'attribute';

    /**
     * Используется ли товаром
     *
     * @return bool
     */
    public function isUsed(): bool
    {
        return AttributeValue::query()
            ->where('attribute_id', $this->id)
            ->exists()
        ;
    }
}
