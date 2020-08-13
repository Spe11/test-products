@extends('layout.app')

@section('title', 'Аттрибуты товаров')

@section('content')
    <h1>Список атрибутов</h1>

    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Ид</th>
                <th scope="col">Название</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($attributes as $attribute)
            <tr>
                <td>{{ $attribute->id }}</td>
                <td>{{ $attribute->name }}</td>
                <td>
                <td>
                    <form method="POST" action="{{ route('attributes.destroy', ['attribute' => $attribute->id]) }}">
                        <a class="btn btn-primary" href="{{ route('attributes.show', ['attribute' => $attribute->id]) }}">Просмотр</a>
                        <a class="btn btn-primary" href="{{ route('attributes.edit', ['attribute' => $attribute->id]) }}">Редактировать</a>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="_method" value="delete"/>

                        @if($attribute->isUsed())
                            <button disabled="true" class="btn btn-danger" type="submit">Удалить</button>
                        @else
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>

        <a class="btn btn-primary" href="{{ route('attributes.create') }}">Добавить</a>
    </div>
@endsection