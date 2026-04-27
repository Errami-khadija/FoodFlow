<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;


class OrderController extends Controller
{
    public function store(Request $request)
{

 try {
    $cartItems = CartItem::where('session_id', session()->getId())->get();

    if ($cartItems->isEmpty()) {
        return response()->json(['error' => 'Cart is empty'], 400);
    }

    $restaurant_id = $cartItems->first()->restaurant_id;

    $subtotal = 0;

    foreach ($cartItems as $item) {
        $subtotal += $item->menu->price * $item->quantity;
    }

    $delivery = 2.99;
    $service = 1.50;
    $total = $subtotal + $delivery + $service;

    // 1. Create Order
    $order = Order::create([
        'user_id' => auth()->id(), 
        'session_id' => session()->getId(),

        'restaurant_id' => $restaurant_id,

        'full_name' => $request->full_name,
        'phone' => $request->phone,
        'address' => $request->address,
        'city' => $request->city,
        'zip' => $request->zip,

        'payment_method' => $request->payment_method,
        'total_price' => $total,
    ]);

    // 2. Save Items
    foreach ($cartItems as $item) {
        OrderItem::create([
            
            'order_id' => $order->id,
            'menu_id' => $item->menu_id,
            'quantity' => $item->quantity,
            'price' => $item->menu->price,
        ]);
    }

    // 3. Clear Cart
    CartItem::where('session_id', session()->getId())->delete();

   return response()->json(['success' => true]);
 } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}
}