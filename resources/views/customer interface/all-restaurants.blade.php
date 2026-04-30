@extends('layouts.homeLayout')

@section('content')
<div id="restaurants-list-page" class="pt-16 min-h-full bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
     <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
      <div>
       <h1 class="text-3xl font-extrabold text-dark">All Restaurants</h1>
       <p class="text-gray-600 mt-1">Browse our curated selection of restaurants</p>
      </div>
      <div class="mt-4 md:mt-0 flex items-center space-x-4">
       <div class="relative">
        <input type="text" placeholder="Search restaurants..." class="pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none w-64"> <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
       </div>
       <select class="px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none bg-white"> 
        <option>All Cuisines</option> 
        <option>Pizza</option> 
        <option>Burgers</option> 
        <option>Sushi</option> 
        <option>Salads</option> </select>
      </div>
     </div>
    
    <div id="restaurants-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($restaurants as $r)
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group cursor-pointer" 
        onclick="window.location='{{ route('restaurant.show', $r->id) }}'">
            
            <div class="relative h-40 bg-gradient-to-br {{ $r->gradient }} overflow-hidden">
                <div class="absolute inset-0 flex items-center justify-center text-6xl group-hover:scale-110 transition-transform">
                    <img src="{{ $r->image ? asset('storage/' . $r->image) : asset('images/default-restaurant.png') }}"
     alt="{{ $r->name }}"
     class="h-60 w-full object-cover rounded-t-2xl">
                </div>
                <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-full text-xs font-semibold {{ $r->open_orClose ? 'text-green-600' : 'text-red-600' }}">
                         {{ $r->open_orClose ? 'Open' : 'Closed' }}
                </div>
            </div>

            <div class="p-5">
                <h3 class="font-bold text-lg text-dark mb-1">{{ $r->name }}</h3>
                <div class="flex items-center mb-2">
                    <span class="text-yellow-500"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M309.5-18.9c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5-18.9z"/></svg></span>
                    <span class="font-semibold text-dark ml-1">{{ $r->rating }}</span>
                    <span class="text-gray-400 text-sm ml-1">({{ $r->reviews }})</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">🕐 {{ $r->deliveryTime }} min</span>
                    <span class="text-sm text-gray-500">💰 ${{ number_format($r->deliveryFee, 2) }} delivery</span>
                </div>
                <a href="{{ route('restaurant.show', $r->id) }}" class="w-full mt-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all">
                    View Menu
                </a>
            </div>

        </div>
    @endforeach
</div> 
  
    </div>
   </div>
@endsection