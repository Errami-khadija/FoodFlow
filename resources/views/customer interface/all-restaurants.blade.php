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
        <input type="text" placeholder="Search restaurants..." class="pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none w-64"> <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376C296.3 401.1 253.9 416 208 416 93.1 416 0 322.9 0 208S93.1 0 208 0 416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></span>
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
                   <span class="text-sm text-gray-500 flex flex-row">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M168.5 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l32 0 0 25.3c-108 11.9-192 103.5-192 214.7 0 119.3 96.7 216 216 216s216-96.7 216-216c0-39.8-10.8-77.1-29.6-109.2l28.2-28.2c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-23.4 23.4c-32.9-30.2-75.2-50.3-122-55.5l0-25.3 32 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0zm80 184l0 104c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-104c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>  {{ $r->delivery_time ?? '20-30 min' }}
                    </span>
                      <span class="text-sm text-gray-500 flex flex-row">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M0 109.5L0 419.6c0 19.4 11.8 37.3 30.3 43.3 94 30 158.8 8.4 223.3-13.1 62.4-20.8 124.4-41.5 212.1-15.3 22.2 6.6 46.2-8.8 46.2-32l0-310.1c0-19.4-11.8-37.3-30.3-43.3-94-30-158.8-8.4-223.3 13.1-62.4 20.8-124.4 41.5-212.1 15.3-22.2-6.6-46.3 8.8-46.3 32zM256 368c-53 0-96-50.1-96-112s43-112 96-112 96 50.1 96 112-43 112-96 112zM127.1 405.5c.7 4.4-2.8 8.1-7.2 8.1-15.7 0-32.1-1.8-50-6.1-3.5-.8-6-4-6-7.7L64 360c0-4.4 3.6-8.1 8-7.5 28.1 3.5 50.6 25.2 55.2 53zM448 354.6c0 5-4.6 8.8-9.5 8-15.4-2.5-30.2-3.9-44.4-4.3-4.9-.1-8.7-4.5-7.2-9.2 7.3-23.7 28-41.4 53.2-44.6 4.4-.5 8 3.1 8 7.5l0 42.6zm-8-195.1c-28.1-3.5-50.6-25.2-55.2-53-.7-4.4 2.8-8.1 7.2-8.1 15.7 0 32.1 1.8 50 6.1 3.5 .8 6 4 6 7.7l0 39.9c0 4.4-3.6 8.1-8 7.5zm-322.1-5.8c4.9 .1 8.7 4.5 7.2 9.2-7.3 23.7-28 41.4-53.2 44.6-4.4 .5-8-3.1-8-7.5l0-42.6c0-5 4.6-8.8 9.5-8 15.4 2.5 30.2 3.9 44.4 4.3zM240 188c-11 0-20 9-20 20 0 9.7 6.9 17.7 16 19.6l0 48.4-4 0c-11 0-20 9-20 20s9 20 20 20l48 0c11 0 20-9 20-20s-9-20-20-20l-4 0 0-68c0-11-9-20-20-20l-16 0z"/></svg>  ${{ number_format($r->delivery_fee ?? 0, 2) }} delivery
                    </span>
                </div>
                 <div class="w-full mt-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all ">
                <a href="{{ route('restaurant.show', $r->id) }}" class="w-full h-full flex justify-center items-center">
                    View Menu
                </a>
</div>
            </div>

        </div>
    @endforeach
</div> 
  
    </div>
   </div>
@endsection