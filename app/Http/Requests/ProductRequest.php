<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $cost
 */
class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:product,name,' . $this->route('product') , 'max:255'],
            'cost' => ['numeric', 'min:0', 'max:999999'],
        ];
    }
}
