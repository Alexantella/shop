@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
    @if($cartItems->isEmpty())
        <p>Ваша корзина пуста.</p>
    @else
        <table>
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Итоговая стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->price * $item->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h3>Общая стоимость: {{ $totalPrice }}</h3>
        <form action="{{ route('orders.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="button">Оформить заказ</button>
        </form>
    @endif
            </div>
        </div>
    </div>
@endsection

