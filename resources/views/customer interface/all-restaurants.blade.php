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
                    <img src="{{ $r->image ? asset('storage/' . $r->image) : asset('images/default-restaurant.jpg') }}"
     alt="{{ $r->name }}"
     class="h-40 w-full object-cover rounded-t-2xl">
                </div>
                <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-full text-xs font-semibold {{ $r->open_orClose ? 'text-green-600' : 'text-red-600' }}">
                         {{ $r->open_orClose ? 'Open' : 'Closed' }}
                </div>
            </div>

            <div class="p-5">
                <h3 class="font-bold text-lg text-dark mb-1">{{ $r->name }}</h3>
                <div class="flex items-center mb-2">
                    <span class="text-yellow-500">⭐</span>
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