@extends('layout.app')

@section('title', 'Аттрибуты товаров')

@section('content')
    <h1>Атрибут номер {{ $attribute->id }}</h1>

    <div class=col-4>
        <div class="card">
            <div class="card-body">
            Название: {{ $attribute->name }}
            </div>
        </div>
    </div>

@endsection