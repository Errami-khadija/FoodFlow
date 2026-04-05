 <nav id="navbar" class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-sm shadow-sm z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
     <div class="flex justify-between items-center h-16">
      <div class="flex items-center cursor-pointer" onclick="navigateTo('landing')">
       <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center">
       <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 text-white"><path fill="currentColor" d="M48 384c-8.8 0-16 7.2-16 16 0 44.2 35.8 80 80 80l288 0c44.2 0 80-35.8 80-80 0-8.8-7.2-16-16-16L48 384zM32 202c0 12.2 9.9 22 22 22L458 224c12.2 0 22-9.9 22-22 0-17.2-2.6-34.4-10.8-49.5-22.2-40.8-82.3-120.5-213.2-120.5S65 111.6 42.8 152.5C34.6 167.6 32 184.8 32 202zM0 304c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 272c-17.7 0-32 14.3-32 32zM256 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM120 128a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm248-24a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
       </div>
       <span class="ml-3 text-xl font-bold text-dark">FoodFlow</span>
      </div>
      <div class="hidden md:flex items-center space-x-8"><a href="#how-it-works" class="text-gray-600 hover:text-primary transition-colors font-medium">How It Works</a> <a href="#restaurants" class="text-gray-600 hover:text-primary transition-colors font-medium">Restaurants</a> <a href="#testimonials" class="text-gray-600 hover:text-primary transition-colors font-medium">Reviews</a> <button onclick="navigateTo('landing')" class="px-5 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-full font-semibold hover:shadow-lg hover:shadow-orange-200 transition-all duration-300"> Get Started </button>
      </div><button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100" onclick="toggleMobileMenu()">
       <svg class="w-6 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
       </svg></button>
     </div>
    </div><!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
     <div class="px-4 py-4 space-y-3"><a href="#how-it-works" class="block py-2 text-gray-600 hover:text-primary font-medium">How It Works</a> <a href="#restaurants" class="block py-2 text-gray-600 hover:text-primary font-medium">Restaurants</a> <a href="#testimonials" class="block py-2 text-gray-600 hover:text-primary font-medium">Reviews</a> <button onclick="navigateTo('landing')" class="w-full py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-full font-semibold"> Get Started </button>
     </div>
    </div>
   </nav>