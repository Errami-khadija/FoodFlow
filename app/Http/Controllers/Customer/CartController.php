<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;


class CartController extends Controller
{
    public function index()
{
    $cartItems = CartItem::with('menu')
        ->where('session_id', session()->getId())
        ->get();

    $subtotal = $cartItems->sum(function ($item) {
        return $item->menu->price * $item->quantity;
    });

    $delivery = $cartItems->first()?->restaurant->delivery_fee ?? 0;

    return response()->json([
        'items' => $cartItems,
        'subtotal' => $subtotal,
        'delivery' => $delivery,
        'total' => $subtotal + $delivery,
        'count' => $cartItems->sum('quantity')
    ]);
}

public function store(Request $request)
{
    $existingCart = CartItem::where('session_id', session()->getId())->first();

    //  prevent multi-restaurant cart
    if ($existingCart && $existingCart->restaurant_id != $request->restaurant_id) {
        return response()->json([
            'error' => 'different_restaurant'
        ], 400);
    }

    $item = CartItem::where('session_id', session()->getId())
        ->where('menu_id', $request->menu_id)
        ->first();

    if ($item) {
        $item->increment('quantity');
    } else {
        CartItem::create([
            'session_id' => session()->getId(),
            'restaurant_id' => $request->restaurant_id,
            'menu_id' => $request->menu_id,
            'quantity' => 1
        ]);
    }

    return $this->index();
}

public function destroy($id)
{
    CartItem::where('id', $id)
        ->where('session_id', session()->getId())
        ->delete();

    return $this->index();
}

public function clear()
{
    CartItem::where('session_id', session()->getId())->delete();
    return response()->json(['success' => true]);
}
}
