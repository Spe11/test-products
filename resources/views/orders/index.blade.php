@extends('layout.app')

@section('title', 'Заказы')

@section('content')
    <h1>Список заказов</h1>

    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Ид</th>
                <th scope="col">Товар</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->count }}</td>
                <td>{{ $order->total }}</td>
                <td>
                <td>
                    <form method="POST" action="{{ route('orders.destroy', ['order' => $order->id]) }}">
                        <a class="btn btn-primary" href="{{ route('orders.show', ['order' => $order->id]) }}">Просмотр</a>
                        <a class="btn btn-primary" href="{{ route('orders.edit', ['order' => $order->id]) }}">Редактировать</a>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="_method" value="delete"/>

                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>

        <a class="btn btn-primary" href="{{ route('orders.create') }}">Добавить</a>
    </div>
@endsection