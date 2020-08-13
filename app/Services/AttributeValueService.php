<?php

namespace App\Services;

use App\Models\db\Attribute;
use App\Models\db\AttributeValue;
use App\Models\db\Product;

/**
 * Сервис управления значениями аттрибутами
 *
 */
class AttributeValueService
{
    /**
     * Добавить
     *
     * @param int    $productId
     * @param int    $attributeId
     * @param string $value
     *
     * @return void
     */
    public function add(int $productId, int $attributeId, string $value)
    {
        $attributeValue               = new AttributeValue;
        $attributeValue->product_id   = $productId;
        $attributeValue->attribute_id = $attributeId;
        $attributeValue->value        = $value;

        $attributeValue->save();
    }

    /**
     * Редактировать
     *
     * @param AttributeValue $attributeValue
     * @param string         $value
     *
     * @return void
     */
    public function update(AttributeValue $attributeValue, string $value)
    {
        $attributeValue->value = $value;

        $attributeValue->save();
    }

    /**
     * Удалить
     *
     * @param AttributeValue $attributeValue
     *
     * @return void
     */
    public function delete(AttributeValue $attributeValue)
    {
        $attributeValue->delete();
    }
}
