@extends('layout.app')

@section('title', 'Товары')

@section('content')
    <h1>Товар номер {{ $product->id }}</h1>

    <div class=col-4>
        <div class="card">
            <div class="card-body">
            Название: {{ $product->name }}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                Цена: {{ $product->cost }}
            </div>
        </div>

         <div class="card">
            <div class="card-body">
                Аттрибуты:
                <div>
                    @foreach ($product->attributeValues as $attributeValue)
                        {{ $attributeValue->attribute->name }}: {{ $attributeValue->value }}
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection