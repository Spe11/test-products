@extends('layout.app')

@section('title', 'Аттрибуты товаров')

@section('content')
    <h1>Добавить атрибут</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('attribute-values.store') }}">

            <div class="form-group">
                <label for="value">Аттрибут</label>
                <select name="attributeId" id="attributeId" value="{{ old('attributeId')}}">
                    @foreach ($attributes as $attribute)
                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="value">Значение</label>
                <input type="text" name="value" class="form-control" id="value" value="{{ old('value') }}">
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <input name="productId" type="hidden" value="{{ $productId }}"/>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection