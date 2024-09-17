<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);

        return view('products.index', compact('products'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => (int) $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }
}
