@extends('layout.app')

@section('title', 'Товары')

@section('content')
    <h1>Добавить товар</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('products.store') }}">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="cost">Цена</label>
                <input type="text" name="cost" class="form-control" id="cost" value="{{ old('cost') }}">
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection