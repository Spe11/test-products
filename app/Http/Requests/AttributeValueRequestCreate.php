<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $productId
 * @property string $attributeId
 * @property string $value
 */
class AttributeValueRequestCreate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'productId' => ['required', 'exists:product,id'],
            'attributeId' => ['required', 'exists:attribute,id'],
            'value' => ['required', 'max:255'],
            'productId' => Rule::unique('attribute_value', 'product_id')->where(function ($query) {
                return $query->where('attribute_id', $this->attributeId);
            })
        ];
    }
}
