<?php

namespace App\Services;

use App\Models\db\Attribute;

/**
 * Сервис управления аттрибутами
 *
 */
class AttributeService
{
    /**
     * Добавить
     *
     * @param string $name
     *
     * @return void
     */
    public function add(string $name)
    {
        $attribute       = new Attribute;
        $attribute->name = $name;

        $attribute->save();
    }

    /**
     * Редактировать
     *
     * @param Attribute $attribute
     * @param string  $name
     *
     * @return void
     */
    public function update(Attribute $attribute, string $name)
    {
        $attribute->name = $name;

        $attribute->save();
    }

    /**
     * Удалить
     *
     * @param Attribute $attribute
     *
     * @return void
     */
    public function delete(Attribute $attribute)
    {
        $attribute->delete();
    }
}
