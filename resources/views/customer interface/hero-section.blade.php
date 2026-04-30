<section class="relative overflow-hidden bg-gradient-to-br from-white via-orange-50/30 to-red-50/30 min-h-[calc(100%-4rem)]">
     <div class="absolute inset-0 overflow-hidden">
      <div class="absolute -top-40 -right-40 w-80 h-80 bg-orange-200/30 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-red-200/30 rounded-full blur-3xl"></div>
     </div>
     <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
       <div class="text-center lg:text-left">
        <div class="inline-flex items-center px-4 py-2 bg-orange-100 rounded-full mb-6 animate-fade-in"><span class="text-primary font-semibold text-sm">#1 Food Delivery Platform</span>
        </div>
        <h1 id="hero-headline" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-dark leading-tight mb-6 animate-fade-in stagger-1">Order Your <span class="gradient-text">Favorite Meals</span> Online</h1>
        <p id="hero-subtext" class="text-lg sm:text-xl text-gray-600 mb-8 animate-fade-in stagger-2 max-w-lg mx-auto lg:mx-0">Fast delivery. Secure payments. Real-time tracking. Experience the future of food ordering.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fade-in stagger-3">
          <a id="cta-primary-btn" href="{{ route('restaurants') }}" class="px-8 py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-full font-bold text-lg shadow-lg shadow-orange-200 hover:shadow-xl hover:shadow-orange-300 transition-all duration-300 hover:-translate-y-1"> Browse Restaurants </a> 
          <button id="cta-secondary-btn" onclick="openRestaurantRegister()" class="px-8 py-4 bg-white text-dark rounded-full font-bold text-lg border-2 border-gray-200 hover:border-primary hover:text-primary transition-all duration-300"> Start Your Restaurant </button>
        </div>
        <div class="flex items-center justify-center lg:justify-start mt-8 space-x-6 animate-fade-in stagger-4">
         <div class="flex -space-x-3">
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">
           JD
          </div>
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-green-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">
           MK
          </div>
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">
           AS
          </div>
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-400 to-pink-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">
           +5k
          </div>
         </div>
         <div class="text-left">
          <div class="flex items-center text-yellow-500">
    @for ($i = 0; $i < 5; $i++)
        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path d="M309.5 13.5c-4.1-8-12.4-13.1-21.4-13.1s-17.3 5.1-21.4 13.1L193.1 125.3 33.2 150.7c-8.9 1.4-16.3 7.7-19.1 16.3s-.5 18 5.8 24.4l114.4 114.5-25.2 159.9c-1.4 8.9 2.3 17.9 9.6 23.2s16.9 6.1 25 2L288.1 417.6 432.4 491c8 4.1 17.7 3.3 25-2s11-14.2 9.6-23.2L441.7 305.9 556.1 191.4c6.4-6.4 8.6-15.8 5.8-24.4s-10.1-14.9-19.1-16.3L383 125.3 309.5 13.5z"/>
        </svg>
    @endfor
</div>
          <p class="text-sm text-gray-500">Trusted by 50,000+ customers</p>
         </div>
        </div>
       </div>
       <div class="relative animate-fade-in stagger-2">
        <div class="relative bg-gradient-to-br from-orange-100 to-red-100 rounded-3xl p-8 lg:p-12">
      <div class="grid grid-cols-2 gap-4">
        <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-bounce-slow overflow-hidden" style="animation-delay: 0s; height: 200px; width: 200px;">
    
    <!-- Background Image -->
    <div class="absolute inset-0 bg-center bg-cover rounded-2xl opacity-60" 
         style="background-image: url('{{ asset('images/pizza.png') }}');">
    </div>

    <!-- Content at bottom-left -->
    <div class="relative z-10 p-4 flex flex-col justify-end h-full text-left text-black">
        <h3 class="font-bold text-lg mb-1">Pizza</h3>
        <p class="text-sm">20+ options</p>
    </div>
</div>
          <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-bounce-slow overflow-hidden" style="animation-delay: 0s; height: 200px; width: 200px;">
    
    <!-- Background Image -->
    <div class="absolute inset-0 bg-center bg-cover rounded-2xl opacity-60" 
         style="background-image: url('{{ asset('images/burgers.png') }}');">
    </div>

    <!-- Content at bottom-left -->
    <div class="relative z-10 p-4 flex flex-col justify-end h-full text-left text-black">
        <h3 class="font-bold text-lg mb-1">Burgers</h3>
        <p class="text-sm">25+ options</p>
    </div>
</div>
          <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-bounce-slow overflow-hidden" style="animation-delay: 0s; height: 200px; width: 200px;">
    
    <!-- Background Image -->
    <div class="absolute inset-0 bg-center bg-cover rounded-2xl opacity-60" 
         style="background-image: url('{{ asset('images/sushi.png') }}');">
    </div>

    <!-- Content at bottom-left -->
    <div class="relative z-10 p-4 flex flex-col justify-end h-full text-left text-black">
        <h3 class="font-bold text-lg mb-1">Sushi</h3>
        <p class="text-sm">30+ options</p>
    </div>
</div>
         <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow animate-bounce-slow overflow-hidden" style="animation-delay: 0s; height: 200px; width: 200px;">
    
    <!-- Background Image -->
    <div class="absolute inset-0 bg-center bg-cover rounded-2xl opacity-60" 
         style="background-image: url('{{ asset('images/salad.jpg') }}');">
    </div>

    <!-- Content at bottom-left -->
    <div class="relative z-10 p-4 flex flex-col justify-end h-full text-left text-black">
        <h3 class="font-bold text-lg mb-1">Salads</h3>
        <p class="text-sm">15+ options</p>
    </div>
</div>
         </div>
         <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-4 shadow-xl animate-pulse-slow">
          <div class="flex items-center space-x-2">
           <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div><span class="text-sm font-semibold text-green-600">Live Tracking</span>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>