@extends('layout.app')

@section('title', 'Аттрибуты товаров')

@section('content')
    <h1>Редактировать атрибут</h1>

    <div class="col-4">
        <form method="POST" action="{{ route('attributes.update', ['attribute' => $attribute->id]) }}">
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{old('name', $attribute->name)}}">
            </div>

            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach

            <input type="hidden" name="_method" value="put"/>
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
    </div>
@endsection