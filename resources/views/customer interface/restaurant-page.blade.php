 @extends('layouts.homeLayout')

@section('content')
 <div id="restaurant-page" class="pt-16 min-h-full bg-gray-50">
    <div id="restaurant-content">

<div class="relative h-48 sm:h-64 overflow-hidden rounded-b-2xl bg-gradient-to-br {{ $restaurant->gradient }}">
    <!-- Emoji overlay -->
    <div class="absolute inset-0 flex items-center justify-center text-8xl">
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
                        ⭐ <span class="font-semibold text-dark ml-1">{{ $restaurant->rating }}</span>
                        <span class="text-gray-400 text-sm ml-1">({{ $restaurant->reviews }} reviews)</span>
                    </span>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-500">🕐 {{ $restaurant->deliveryTime }} min</span>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-500">💰 ${{ number_format($restaurant->deliveryFee, 2) }} delivery</span>
                </div>
            </div>

            <!-- Cart Button -->
            <button onclick="toggleCartSidebar()" class="mt-4 sm:mt-0 px-6 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold flex items-center hover:shadow-lg transition-all">
                <span class="mr-2">🛒</span>
                View Cart (<span id="header-cart-count">{{ count($cart ?? []) }}</span>)
            </button>
        </div>
    </div>

    <!-- Categories Tabs -->
    <div class="flex overflow-x-auto hide-scrollbar gap-2 mb-6 pb-2">
        @foreach($restaurant->categories as $i => $cat)
            <button onclick="scrollToCategory('{{ $cat }}')" class="px-6 py-3 {{ $i === 0 ? 'bg-gradient-to-r from-primary to-secondary text-white' : 'bg-white text-gray-700 hover:bg-gray-50' }} rounded-xl font-semibold whitespace-nowrap shadow-md transition-all">
                {{ $cat }}
            </button>
        @endforeach
    </div>

    <!-- Menu Items -->
    @foreach($restaurant->categories as $cat)
        <div id="category-{{ $cat }}" class="mb-8">
            <h2 class="text-xl font-bold text-dark mb-4">{{ $cat }}</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($restaurant->menu[$cat] ?? [] as $item)
                    <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-all group">
                        <div class="flex items-start">
                            <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center text-4xl group-hover:scale-110 transition-transform">
                                {{ $item['emoji'] }}
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="font-bold text-dark">{{ $item['name'] }}</h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $item['desc'] }}</p>
                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-bold text-primary">${{ number_format($item['price'], 2) }}</span>
                                    <button onclick="addToCart({{ $restaurant->id }}, {{ $item['id'] }})" class="w-8 h-8 bg-gradient-to-r from-primary to-secondary text-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                        <span class="text-xl leading-none">+</span>
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
   @endsection