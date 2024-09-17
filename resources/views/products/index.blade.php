@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>
                    <h3>{{ $product->name }}</h3>
                </td>
                <td>
                    <p>${{ $product->price }}</p>
                </td>
                <td>
                @if (Auth::check())
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="1">
                        <button type="submit">В корзину</button>
                    </form>
                @else
                    <p><a href="{{ route('login') }}">Войдите, чтобы добавить товар в корзину</a></p>
                @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>

<!-- Пагинация -->
                <div class="row">
                    <div class="d-flex">
    {{ $products->links() }}
</div>
        </div>
    </div>
@endsection
