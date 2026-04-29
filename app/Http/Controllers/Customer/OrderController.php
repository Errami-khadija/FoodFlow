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

        // Prevent card from using this method
        if ($request->payment_method === 'card') {
            return response()->json([
                'error' => 'Card payment must go through Stripe'
            ], 400);
        }

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

        //  Create Order (cash only)
        $order = Order::create([
            'user_id' => auth()->id(),
            'session_id' => session()->getId(),
            'restaurant_id' => $restaurant_id,

            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,

            'payment_method' => 'cash',
            'total_price' => $total,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item->menu_id,
                'quantity' => $item->quantity,
                'price' => $item->menu->price,
            ]);
        }

        CartItem::where('session_id', session()->getId())->delete();

        return response()->json(['success' => true,
          'order_id' => $order->id]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}



public function success()
{
    $cartItems = CartItem::where('session_id', session()->getId())->get();

    if ($cartItems->isEmpty()) {
        return redirect('/')->with('error', 'Cart is empty');
    }

    $restaurant_id = $cartItems->first()->restaurant_id;

    $subtotal = 0;

    foreach ($cartItems as $item) {
        $subtotal += $item->menu->price * $item->quantity;
    }

    $delivery = 2.99;
    $service = 1.50;
    $total = $subtotal + $delivery + $service;

    //  Create Order AFTER payment
    $order = Order::create([
        'restaurant_id' => $restaurant_id,
        'total_price' => $total,

        'full_name' => session('checkout.full_name'),
        'phone' => session('checkout.phone'),
        'address' => session('checkout.address'),
        'city' => session('checkout.city'),
        'zip' => session('checkout.zip'),

        'payment_method' => 'card',
        'status' => 'paid',
    ]);

    // Save items
    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $item->menu_id,
            'quantity' => $item->quantity,
            'price' => $item->menu->price,
        ]);
    }

    // Clear cart
    CartItem::where('session_id', session()->getId())->delete();

    //  Clear stored checkout data
    session()->forget('checkout');

    return view('customer interface.success', compact('order'));
}

public function status($id)
{
    $order = Order::findOrFail($id);

    return view('customer interface.order-tracking', compact('order'));
}
}