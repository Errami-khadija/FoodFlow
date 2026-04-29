@extends('layouts.homeLayout')
@section('content')
<div id="tracking-page" class="pt-16 min-h-full bg-gradient-to-br from-green-50 to-emerald-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
     <div class="text-center mb-8">
      <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse-slow"><span class="text-4xl">✓</span>
      </div>
     <h1 id="status-title" class="text-3xl font-extrabold text-dark"></h1>
      <p class="text-gray-600 mt-2">Order #OR  <span id="order-number">{{ $order->id }}</span></p>
     </div>
     <div class="bg-white rounded-3xl p-8 shadow-xl mb-8">
      <h2 class="text-xl font-bold text-dark mb-6">Order Status</h2>
      <div class="relative">
       <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gray-200"></div>
       <div class="absolute left-6 top-0 w-0.5 bg-gradient-to-b from-green-500 to-primary transition-all duration-1000" id="progress-line" style="height: 25%;"></div>
       <div class="space-y-8">
         <!-- Pending -->
    <div class="flex items-center relative" id="status-pending">
        <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center z-10 shadow-lg" id="pending-circle">
            <span class="text-xl">⏳</span>
        </div>
        <div class="ml-6">
            <h3 class="font-bold text-dark">Pending</h3>
            <p class="text-sm text-gray-500">Waiting for confirmation</p>
        </div>
    </div>

    <!-- Confirmed -->
    <div class="flex items-center relative" id="status-confirmed">
        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center z-10 transition-all duration-500" id="confirmed-circle">
            <span class="text-xl">✓</span>
        </div>
        <div class="ml-6">
            <h3 class="font-bold text-dark">Order Confirmed</h3>
            <p class="text-sm text-gray-500">Your order has been received</p>
        </div>
    </div>
        <div class="flex items-center relative" id="status-preparing">
         <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center z-10 transition-all duration-500" id="preparing-circle"><span class="text-2xl">👨‍🍳</span>
         </div>
         <div class="ml-6">
          <h3 class="font-bold text-dark">Preparing</h3>
          <p class="text-sm text-gray-500">The restaurant is preparing your food</p>
         </div>
        </div>
        <div class="flex items-center relative" id="status-delivery">
         <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center z-10 transition-all duration-500" id="delivery-circle"><span class="text-2xl">🚗</span>
         </div>
         <div class="ml-6">
          <h3 class="font-bold text-dark">Out for Delivery</h3>
          <p class="text-sm text-gray-500">Your order is on its way</p>
         </div>
        </div>
        <div class="flex items-center relative" id="status-delivered">
         <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center z-10 transition-all duration-500" id="delivered-circle"><span class="text-2xl">📦</span>
         </div>
         <div class="ml-6">
          <h3 class="font-bold text-dark">Delivered</h3>
          <p class="text-sm text-gray-500">Enjoy your meal!</p>
         </div>
        </div>
       </div>
      </div>
     </div>
     <div class="bg-white rounded-3xl p-8 shadow-xl mb-8">
      <h2 class="text-xl font-bold text-dark mb-4">Estimated Delivery</h2>
      <div class="flex items-center justify-center space-x-4">
       <div class="text-center">
        <div class="text-4xl font-extrabold gradient-text" id="eta-time">
         25-35
        </div>
        <div class="text-gray-500">
         minutes
        </div>
       </div>
      </div>
     </div>
     <div class="text-center"><a href="/" class="px-8 py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-full font-bold hover:shadow-lg transition-all"> Back to Home </a>
     </div>
    </div>

    <script>
    startOrderTracking();
</script>

   @endsection