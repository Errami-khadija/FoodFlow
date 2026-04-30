<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;


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



public function success(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $sessionId = $request->get('session_id');

    if (!$sessionId) {
        return redirect('/')->with('error', 'Invalid payment session');
    }

    $session = StripeSession::retrieve($sessionId);

    // Optional: check payment status
    if ($session->payment_status !== 'paid') {
        return redirect('/')->with('error', 'Payment not completed');
    }

    // Now create order (same logic as before)
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

    $order = Order::create([
        'restaurant_id' => $restaurant_id,
        'total_price' => $total,

        'full_name' => session('checkout.full_name'),
        'phone' => session('checkout.phone'),
        'address' => session('checkout.address'),
        'city' => session('checkout.city'),
        'zip' => session('checkout.zip'),

        'payment_method' => 'card',

    
        'status' => 'confirmed',
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
    session()->forget('checkout');

    // REDIRECT TO TRACKING PAGE
    return redirect()->route('customer.order.show', $order->id);
}

public function status($id)
{
    $order = Order::findOrFail($id);

    return response()->json([
        'status' => $order->status
    ]);
}

public function show($id)
{
    $order = Order::with('items.menu')->findOrFail($id);

    return view('customer interface.order-tracking', compact('order'));
}
}