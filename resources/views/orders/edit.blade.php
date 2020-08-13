@extends('layout.app')

@section('title', 'Заказы')

@section('content')
    <h1>Редактировать заказ</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('orders.update', ['order' => $order->id]) }}">
            <div class="form-group">
                <label for="product">Товар</label>
                <select name="productId" id="product" value="{{ old('productId', $order->product_id)}}">
                     @foreach ($products as $product)
                        @if($product->id === $order->product_id)
                            <option selected value="{{ $product->id }}">{{ $product->name }}</option>
                        @else
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="count">Кол-во</label>
                <input type="text" name="count" class="form-control" id="count" value="{{ old('count', $order->count)}}">
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input type="hidden" name="_method" value="put"/>
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection