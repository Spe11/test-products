@extends('layout.app')

@section('title', 'Заказы')

@section('content')
    <h1>Заказ номер {{ $order->id }}</h1>

    <div class=col-4>
        <div class="card">
            <div class="card-body">
            Товар: {{ $order->product->name }}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                Количество: {{ $order->count }}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                Сумма: {{ $order->total }}
            </div>
        </div>
    </div>

@endsection