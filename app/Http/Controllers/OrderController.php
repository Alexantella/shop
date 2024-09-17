<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('items.product')->get();
        $totalAmount = $orders->flatMap->items->sum('price');

        return view('orders.index', compact('orders', 'totalAmount'));
    }

    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $order = Order::create(['user_id' => Auth::id()]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан!');
    }
}
