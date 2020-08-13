<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\db\Order;
use App\Models\db\Product;
use App\Services\OrderService;

class OrderController extends Controller
{
    /** @var OrderService  $service */
    private $service;

    /**
     * @param OrderService $service
     */
    public function __construct(OrderService $service)
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
        $orders = Order::with(['product'])->get();

        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();

        return view('orders.create')->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $product = Product::findOrFail($request->productId);

        $this->service->add($product, $request->count);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.view')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order    = Order::findOrFail($id);
        $products = Product::get();

        return view('orders.edit')->with('order', $order)->with('products', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order   = Order::findOrFail($id);
        $product = Product::findOrFail($request->productId);

        $this->service->update($order, $product, (int)$request->count);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** @var Order $order */
        $order = Order::findOrFail($id);

        $this->service->delete($order);

        return redirect()->route('orders.index');
    }
}
