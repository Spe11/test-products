@extends('layout.app')

@section('title', 'Товары')

@section('content')
    <h1>Список товаров</h1>

    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Ид</th>
                <th scope="col">Название</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Аттрибуты</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->cost }}</td>
                <td>
                @foreach ($product->attributeValues as $attributeValue)
                    {{ $attributeValue->attribute->name }}: {{ $attributeValue->value }}
                    <br>
                @endforeach
                </td>
                <td>
                    <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                        <a class="btn btn-primary" href="{{ route('products.show', ['product' => $product->id]) }}">Просмотр</a>
                        <a class="btn btn-primary" href="{{ route('products.edit', ['product' => $product->id]) }}">Редактировать</a>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="_method" value="delete"/>

                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>

        <a class="btn btn-primary" href="{{ route('products.create') }}">Добавить</a>
    </div>
@endsection