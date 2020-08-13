@extends('layout.app')

@section('title', 'Товары')

@section('content')
    <h1>Редактировать товар</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{old('name', $product->name)}}">
            </div>
            <div class="form-group">
                <label for="cost">Цена</label>
                <input type="text" name="cost" class="form-control" id="cost" value="{{old('cost', $product->cost)}}">
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input type="hidden" name="_method" value="put"/>
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

         @foreach ($product->attributeValues as $attributeValue)
                <form method="POST" action="{{ route('attribute-values.update', ['attribute_value' => $attributeValue->id]) }}">
                    <label for="value">{{ $attributeValue->attribute->name }}</label>
                        <div class="d-flex">
                        <input type="text" name="value" class="form-control" id="value" value="{{ $attributeValue->value }}">

                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="_method" value="put"/>

                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </form>
                <form method="POST" action="{{ route('attribute-values.destroy', ['attribute_value' => $attributeValue->id]) }}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="_method" value="delete"/>

                        <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            @endforeach

            <a class="btn btn-primary mt-3" href="{{ route('attribute-values.create', ['productId' => $product->id]) }}">Добавить</a>
    </div>
@endsection