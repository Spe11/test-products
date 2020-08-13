<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Models\db\Attribute;
use App\Services\AttributeService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AttributeController extends Controller
{
    /** @var AttributeService $service */
    private $service;

    /**
     * @param AttributeService $service
     */
    public function __construct(AttributeService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::get();

        return view('attributes.index')->with('attributes', $attributes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $this->service->add($request->name);

        return redirect()->route('attributes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = Attribute::findOrFail($id);

        return view('attributes.view')->with('attribute', $attribute);
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

        return view('attributes.edit')->with('attribute', $attribute);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AttributeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        /** @var Attribute $attribute */
        $attribute = Attribute::findOrFail($id);

        $this->service->update($attribute, $request->name);

        return redirect()->route('attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** @var Attribute $attribute */
        $attribute = Attribute::findOrFail($id);

        if ($attribute->isUsed()) {
            throw new BadRequestHttpException;
        }

        $this->service->delete($attribute);

        return redirect()->route('attributes.index');
    }
}
