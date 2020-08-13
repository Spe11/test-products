<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeValueRequestCreate;
use App\Http\Requests\AttributeValueRequestUpdate;
use App\Models\db\Attribute;
use App\Models\db\AttributeValue;
use App\Models\db\Product;
use App\Services\AttributeValueService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AttributeValueController extends Controller
{
    /** @var AttributeValueService $service */
    private $service;

    /**
     * @param AttributeValueService $service
     */
    public function __construct(AttributeValueService $service)
    {
        $this->service = $service;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productId = request('productId');

        $ids = AttributeValue::query()
            ->where('product_id', $productId)
            ->pluck('attribute_id')
            ->toArray()
        ;
        $attributes = Attribute::whereNotIn('id', $ids)->get();

        return view('attributeValues.create')->with('attributes', $attributes)->with('productId', $productId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AttributeValueRequestCreate  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeValueRequestCreate $request)
    {
        $this->service->add((int)$request->productId, (int)$request->attributeId, $request->value);

        return redirect()->route('products.edit', ['product' => $request->productId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('attributeValues.edit')->with('attribute', $attribute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AttributeValueRequestUpdate  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeValueRequestUpdate $request, $id)
    {
        /** @var AttributeValue $attributeValue */
        $attributeValue = AttributeValue::findOrFail($id);

        $this->service->update($attributeValue, $request->value);

        return redirect()->route('products.edit', ['product' => $attributeValue->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** @var AttributeValue $attributeValue */
        $attributeValue = AttributeValue::findOrFail($id);
        $productId      = $attributeValue->product_id;

        $this->service->delete($attributeValue);

        return redirect()->route('products.edit', ['product' => $productId]);
    }
}
