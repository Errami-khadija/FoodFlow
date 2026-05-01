 @extends('layouts.homeLayout')

@section('content')
 <div id="restaurant-page" class="pt-16 min-h-full bg-gray-50">
    <div id="restaurant-content">

<div class="relative h-48 sm:h-64 overflow-hidden rounded-b-2xl bg-gradient-to-br {{ $restaurant->gradient }}">
    <!-- Image overlay -->
    <div class="absolute inset-0 flex items-center justify-center text-8xl bg-gradient-to-tr from-black/30 to-transparent">
       <img src="{{ $restaurant->image ? asset('storage/' . $restaurant->image) : asset('images/default-restaurant.jpg') }}"
     alt="{{ $restaurant->name }}"
     class="h-40 w-full object-cover rounded-t-2xl">
    </div>

    <!-- Back Button -->
    <a href="{{ url()->previous() }}" class="absolute top-4 left-4 w-10 h-10 bg-white/90 rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </a>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <!-- Restaurant Info Card -->
    <div class="bg-white rounded-2xl p-6 shadow-lg -mt-16 relative z-10 mb-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-dark">{{ $restaurant->name }}</h1>
                <div class="flex items-center mt-2 flex-wrap gap-2">
                    <span class="flex items-center text-yellow-500">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M309.5-18.9c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5-18.9z"/></svg>
                        <span class="font-semibold text-dark ml-1">{{ $restaurant->rating }}</span>
                    </span>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-500 flex flex-row"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M168.5 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l32 0 0 25.3c-108 11.9-192 103.5-192 214.7 0 119.3 96.7 216 216 216s216-96.7 216-216c0-39.8-10.8-77.1-29.6-109.2l28.2-28.2c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-23.4 23.4c-32.9-30.2-75.2-50.3-122-55.5l0-25.3 32 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0zm80 184l0 104c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-104c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>  {{ $restaurant->delivery_time ?? '20-30 min' }}
                 </span>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-500 flex flex-row "> <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M0 109.5L0 419.6c0 19.4 11.8 37.3 30.3 43.3 94 30 158.8 8.4 223.3-13.1 62.4-20.8 124.4-41.5 212.1-15.3 22.2 6.6 46.2-8.8 46.2-32l0-310.1c0-19.4-11.8-37.3-30.3-43.3-94-30-158.8-8.4-223.3 13.1-62.4 20.8-124.4 41.5-212.1 15.3-22.2-6.6-46.3 8.8-46.3 32zM256 368c-53 0-96-50.1-96-112s43-112 96-112 96 50.1 96 112-43 112-96 112zM127.1 405.5c.7 4.4-2.8 8.1-7.2 8.1-15.7 0-32.1-1.8-50-6.1-3.5-.8-6-4-6-7.7L64 360c0-4.4 3.6-8.1 8-7.5 28.1 3.5 50.6 25.2 55.2 53zM448 354.6c0 5-4.6 8.8-9.5 8-15.4-2.5-30.2-3.9-44.4-4.3-4.9-.1-8.7-4.5-7.2-9.2 7.3-23.7 28-41.4 53.2-44.6 4.4-.5 8 3.1 8 7.5l0 42.6zm-8-195.1c-28.1-3.5-50.6-25.2-55.2-53-.7-4.4 2.8-8.1 7.2-8.1 15.7 0 32.1 1.8 50 6.1 3.5 .8 6 4 6 7.7l0 39.9c0 4.4-3.6 8.1-8 7.5zm-322.1-5.8c4.9 .1 8.7 4.5 7.2 9.2-7.3 23.7-28 41.4-53.2 44.6-4.4 .5-8-3.1-8-7.5l0-42.6c0-5 4.6-8.8 9.5-8 15.4 2.5 30.2 3.9 44.4 4.3zM240 188c-11 0-20 9-20 20 0 9.7 6.9 17.7 16 19.6l0 48.4-4 0c-11 0-20 9-20 20s9 20 20 20l48 0c11 0 20-9 20-20s-9-20-20-20l-4 0 0-68c0-11-9-20-20-20l-16 0z"/></svg>  ${{ number_format($r->delivery_fee ?? 0, 2) }} delivery
                </span>
                 <span class="text-gray-400">•</span>
                    <span class="text-gray-500 flex flex-row"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M48 384c-8.8 0-16 7.2-16 16 0 44.2 35.8 80 80 80l288 0c44.2 0 80-35.8 80-80 0-8.8-7.2-16-16-16L48 384zM32 202c0 12.2 9.9 22 22 22L458 224c12.2 0 22-9.9 22-22 0-17.2-2.6-34.4-10.8-49.5-22.2-40.8-82.3-120.5-213.2-120.5S65 111.6 42.8 152.5C34.6 167.6 32 184.8 32 202zM0 304c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 272c-17.7 0-32 14.3-32 32zM256 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM120 128a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm248-24a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                      <span class="font-semibold text-dark ml-1"> {{$restaurant->cuisine_type}}</span>
</span>
</div>
               
            </div>
                     
            <!-- Cart Button -->
            <button onclick="toggleCartSidebar()" class="mt-4 sm:mt-0 px-6 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold flex items-center hover:shadow-lg transition-all">
                <span class="mr-2 text-white"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M160 80c0-35.3 28.7-64 64-64s64 28.7 64 64l0 48-128 0 0-48zm-48 48l-64 0c-26.5 0-48 21.5-48 48L0 384c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-208c0-26.5-21.5-48-48-48l-64 0 0-48c0-61.9-50.1-112-112-112S112 18.1 112 80l0 48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/></svg></span>
                View Cart (<span id="header-cart-count">
    {{ isset($cartCount) ? $cartCount : 0 }}
</span>)
            </button>
        </div>
    </div>

    <!-- Categories Tabs -->
    <div class="flex overflow-x-auto hide-scrollbar gap-2 mb-6 pb-2">
       @foreach($restaurant->categories as $i => $cat)
    <button onclick="scrollToCategory('{{ $cat->id }}')"
        class="px-6 py-3 {{ $i === 0 ? 'bg-gradient-to-r from-primary to-secondary text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }} rounded-xl font-semibold whitespace-nowrap shadow-md transition-all">
        {{ $cat->name }}
    </button>
@endforeach
    </div>

    <!-- Menu Items -->
   @foreach($restaurant->categories as $cat)
    <div id="category-{{ $cat->id }}" class="mb-8">
        <h2 class="text-xl font-bold text-dark mb-4">{{ $cat->name }}</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($cat->menus as $item)
        <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-all group">
            <div class="flex items-start">

               
                <div class="w-20 h-20 rounded-xl overflow-hidden">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/default-food.jpg') }}"
                         class="w-full h-full object-cover">
                </div>

                <div class="ml-4 flex-1">
                    <h3 class="font-bold text-dark">{{ $item->name }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $item->description }}</p>

                    <div class="flex items-center justify-between mt-3">
                        <span class="font-bold text-primary">${{ number_format($item->price, 2) }}</span>

                        <button onclick="addToCart({{ $item->id }}, {{ $restaurant->id }})"
                            class="w-8 h-8 bg-gradient-to-r from-primary to-secondary text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                            +
                        </button>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
        </div>
    @endforeach
</div>

    </div>
   </div>

    <!-- Cart Sidebar -->
    @include('customer interface.cart')
   @endsection