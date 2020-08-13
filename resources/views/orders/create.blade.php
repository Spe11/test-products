@extends('layout.app')

@section('title', 'Заказы')

@section('content')
    <h1>Добавить заказ</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('orders.store') }}">
            <div class="form-group">
                <label for="product">Товар</label>
                <select name="productId" id="product" value="{{ old('productId') }}" class="selectpicker">
                     @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="count">Кол-во</label>
                <input type="text" name="count" class="form-control" id="count" value="{{ old('count') }}">
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection