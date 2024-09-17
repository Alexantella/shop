@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
<table>
    <tr>
        <th>Номер заказа</th>
        <th>Дата заказа</th>
        <th>Товары</th>
        <th>Итоговая стоимость</th>
    </tr>
    @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->created_at }}</td>
            <td>
                @foreach ($order->items as $item)
                    {{ $item->product->name }} (x{{ $item->quantity }})
                @endforeach
            </td>
            <td>${{ $order->items->sum('price') }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">Итого: ${{ $orders->sum(fn($order) => $order->items->sum('price')) }}</td>
    </tr>
</table>
</div>
</div>
</div>
@endsection

