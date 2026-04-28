<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\CartItem;


class PaymentController extends Controller
{
   public function pay(Request $request)
{
    try {

        Stripe::setApiKey(env('STRIPE_SECRET'));

        session([
            'checkout' => [
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'zip' => $request->zip,
            ]
        ]);

        $cartItems = CartItem::where('session_id', session()->getId())->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }

        $lineItems = [];

        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->menu->name,
                    ],
                    'unit_amount' => (int) ($item->menu->price * 100),
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => url('/success'),
            'cancel_url' => url('/checkout'),
        ]);

        return response()->json([
            'url' => $session->url
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}
}
