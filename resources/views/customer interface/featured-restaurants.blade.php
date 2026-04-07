<section id="restaurants" class="py-20 bg-gradient-to-br from-gray-50 to-orange-50/30">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-12">
       <div><span class="inline-block px-4 py-2 bg-orange-100 text-primary font-semibold rounded-full text-sm mb-4">Popular Choices</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-dark">Featured Restaurants</h2>
       </div><button onclick="navigateTo('restaurants-list')" class="mt-4 sm:mt-0 text-primary font-semibold hover:underline flex items-center"> View All 
        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg></button>
      </div>
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($restaurants as $restaurant)
        <div 
            class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group cursor-pointer"
            onclick="navigateTo('restaurant', {{ $restaurant->id }})"
        >
            <div class="relative h-40 bg-gradient-to-br from-orange-400 to-orange-600 overflow-hidden">

                <!-- Image -->
                @if($restaurant->image)
                    <img src="{{ asset('storage/' . $restaurant->image) }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                @else
                    <div class="absolute inset-0 flex items-center justify-center text-6xl">
                        🍽️
                    </div>
                @endif

                <!-- Status -->
                <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-full text-xs font-semibold {{ $restaurant->open_orClose ? 'text-green-600' : 'text-red-600' }}">
                         {{ $restaurant->open_orClose ? 'Open' : 'Closed' }}
                </div>
            </div>

            <div class="p-5">
                <h3 class="font-bold text-lg text-dark mb-1">
                    {{ $restaurant->name }}
                </h3>

                <!-- Rating (static or from DB if you have it) -->
                <div class="flex items-center mb-2">
                    <span class="text-yellow-500">⭐</span>
                    <span class="font-semibold text-dark ml-1">
                        {{ $restaurant->rating ?? '4.5' }}
                    </span>
                </div>

                <!-- Extra info -->
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">
                        🕐 {{ $restaurant->delivery_time ?? '20-30 min' }}
                    </span>
                    <span class="text-sm text-gray-500">
                        💰 ${{ number_format($restaurant->delivery_fee ?? 0, 2) }} delivery
                    </span>
                </div>
                <div class="w-full mt-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all ">
                <a href="{{ route('restaurant.show', $restaurant->id) }}" class="w-full h-full flex justify-center items-center">
                    View Menu
                </a>
</div>
            </div>
        </div>
    @endforeach
</div>
      </div>
     </div>
    </section>