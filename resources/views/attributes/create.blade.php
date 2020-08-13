@extends('layout.app')

@section('title', 'Аттрибуты товаров')

@section('content')
    <h1>Добавить атрибут</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('attributes.store') }}">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection