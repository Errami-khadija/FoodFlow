@extends('layouts.homeLayout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 pt-20">

    <div class="bg-white shadow-xl rounded-2xl p-10 max-w-md text-center">

        <!-- Success Icon -->
        <div class="flex justify-center mb-6">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mb-2">
           Order Placed Successfully!
        </h1>

        <p class="text-gray-500 mb-6">
            Your order has been placed successfully and is being processed.
        </p>

        <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-600 mb-6">
            You will receive a confirmation call shortly.
        </div>

        <a href="{{ route('home') }}"
           class="inline-block bg-primary text-white px-6 py-3 rounded-xl font-semibold hover:bg-orange-600 transition">
            Back to Home
        </a>
        <a href="{{ url('/order/' . $order->id . '/status') }}"
           class="inline-block bg-gray-200 text-gray-800 px-6 py-3 rounded-xl font-semibold hover:bg-gray-300 transition ml-4">
            Track Order
        </a>

    </div>

</div>
@endsection