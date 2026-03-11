@extends('layouts.homeLayout')

@section('content')
  <div id="app" class="w-full min-h-full"><!-- Navigation -->
   <nav id="navbar" class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-sm shadow-sm z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
     <div class="flex justify-between items-center h-16">
      <div class="flex items-center cursor-pointer" onclick="navigateTo('landing')">
       <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center"><span class="text-white text-xl">🍽️</span>
       </div><span class="ml-3 text-xl font-bold text-dark">FoodFlow</span>
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
   </nav><!-- Landing Page -->
   <div id="landing-page" class="pt-16"><!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-white via-orange-50/30 to-red-50/30 min-h-[calc(100%-4rem)]">
     <div class="absolute inset-0 overflow-hidden">
      <div class="absolute -top-40 -right-40 w-80 h-80 bg-orange-200/30 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-red-200/30 rounded-full blur-3xl"></div>
     </div>
     <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
       <div class="text-center lg:text-left">
        <div class="inline-flex items-center px-4 py-2 bg-orange-100 rounded-full mb-6 animate-fade-in"><span class="text-primary font-semibold text-sm">🚀 #1 Food Delivery Platform</span>
        </div>
        <h1 id="hero-headline" class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-dark leading-tight mb-6 animate-fade-in stagger-1">Order Your <span class="gradient-text">Favorite Meals</span> Online</h1>
        <p id="hero-subtext" class="text-lg sm:text-xl text-gray-600 mb-8 animate-fade-in stagger-2 max-w-lg mx-auto lg:mx-0">Fast delivery. Secure payments. Real-time tracking. Experience the future of food ordering.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fade-in stagger-3">
          <button id="cta-primary-btn" onclick="navigateTo('restaurants-list')" class="px-8 py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-full font-bold text-lg shadow-lg shadow-orange-200 hover:shadow-xl hover:shadow-orange-300 transition-all duration-300 hover:-translate-y-1"> Browse Restaurants </button> 
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
          <div class="flex items-center text-yellow-500"><span>⭐⭐⭐⭐⭐</span>
          </div>
          <p class="text-sm text-gray-500">Trusted by 50,000+ customers</p>
         </div>
        </div>
       </div>
       <div class="relative animate-fade-in stagger-2">
        <div class="relative bg-gradient-to-br from-orange-100 to-red-100 rounded-3xl p-8 lg:p-12">
         <div class="grid grid-cols-2 gap-4">
          <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow animate-bounce-slow" style="animation-delay: 0s;">
           <div class="text-4xl mb-2">
            🍕
           </div>
           <h3 class="font-bold text-dark">Pizza</h3>
           <p class="text-sm text-gray-500">20+ options</p>
          </div>
          <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow animate-bounce-slow" style="animation-delay: 0.5s;">
           <div class="text-4xl mb-2">
            🍔
           </div>
           <h3 class="font-bold text-dark">Burgers</h3>
           <p class="text-sm text-gray-500">15+ options</p>
          </div>
          <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow animate-bounce-slow" style="animation-delay: 1s;">
           <div class="text-4xl mb-2">
            🍣
           </div>
           <h3 class="font-bold text-dark">Sushi</h3>
           <p class="text-sm text-gray-500">30+ options</p>
          </div>
          <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow animate-bounce-slow" style="animation-delay: 1.5s;">
           <div class="text-4xl mb-2">
            🥗
           </div>
           <h3 class="font-bold text-dark">Salads</h3>
           <p class="text-sm text-gray-500">12+ options</p>
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
    </section><!-- How It Works -->
    <section id="how-it-works" class="py-20 bg-white">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16"><span class="inline-block px-4 py-2 bg-orange-100 text-primary font-semibold rounded-full text-sm mb-4">Simple Process</span>
       <h2 class="text-3xl sm:text-4xl font-extrabold text-dark mb-4">How It Works</h2>
       <p class="text-gray-600 max-w-2xl mx-auto">Order your favorite food in just three simple steps</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
       <div class="relative group">
        <div class="bg-gradient-to-br from-orange-50 to-white rounded-3xl p-8 border border-orange-100 hover:shadow-xl hover:shadow-orange-100 transition-all duration-300 h-full">
         <div class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform"><span class="text-3xl">🏪</span>
         </div>
         <div class="absolute -top-3 -left-3 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">
          1
         </div>
         <h3 class="text-xl font-bold text-dark mb-3">Choose Restaurant</h3>
         <p class="text-gray-600">Browse through hundreds of restaurants and find your favorite cuisine nearby.</p>
        </div>
       </div>
       <div class="relative group">
        <div class="bg-gradient-to-br from-red-50 to-white rounded-3xl p-8 border border-red-100 hover:shadow-xl hover:shadow-red-100 transition-all duration-300 h-full">
         <div class="w-16 h-16 bg-gradient-to-br from-secondary to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform"><span class="text-3xl">🛒</span>
         </div>
         <div class="absolute -top-3 -left-3 w-8 h-8 bg-secondary text-white rounded-full flex items-center justify-center font-bold">
          2
         </div>
         <h3 class="text-xl font-bold text-dark mb-3">Add to Cart</h3>
         <p class="text-gray-600">Select your favorite dishes, customize them, and add to your cart with ease.</p>
        </div>
       </div>
       <div class="relative group">
        <div class="bg-gradient-to-br from-green-50 to-white rounded-3xl p-8 border border-green-100 hover:shadow-xl hover:shadow-green-100 transition-all duration-300 h-full">
         <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform"><span class="text-3xl">📍</span>
         </div>
         <div class="absolute -top-3 -left-3 w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold">
          3
         </div>
         <h3 class="text-xl font-bold text-dark mb-3">Pay &amp; Track</h3>
         <p class="text-gray-600">Secure payment and real-time tracking until your food arrives at your door.</p>
        </div>
       </div>
      </div>
     </div>
    </section><!-- Featured Restaurants -->
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
       <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group cursor-pointer" onclick="navigateTo('restaurant', 1)">
        <div class="relative h-40 bg-gradient-to-br from-red-400 to-red-600 overflow-hidden">
         <div class="absolute inset-0 flex items-center justify-center text-6xl group-hover:scale-110 transition-transform">
          🍕
         </div>
         <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-full text-xs font-semibold text-green-600">
          Open
         </div>
        </div>
        <div class="p-5">
         <h3 class="font-bold text-lg text-dark mb-1">Pizza Paradise</h3>
         <div class="flex items-center mb-2"><span class="text-yellow-500">⭐</span> <span class="font-semibold text-dark ml-1">4.8</span> <span class="text-gray-400 text-sm ml-1">(324)</span>
         </div>
         <div class="flex items-center justify-between"><span class="text-sm text-gray-500">🕐 20-30 min</span> <span class="text-sm text-gray-500">💰 $2.99 delivery</span>
         </div><button class="w-full mt-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all"> View Menu </button>
        </div>
       </div>
       <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group cursor-pointer" onclick="navigateTo('restaurant', 2)">
        <div class="relative h-40 bg-gradient-to-br from-amber-400 to-orange-500 overflow-hidden">
         <div class="absolute inset-0 flex items-center justify-center text-6xl group-hover:scale-110 transition-transform">
          🍔
         </div>
         <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-full text-xs font-semibold text-green-600">
          Open
         </div>
        </div>
        <div class="p-5">
         <h3 class="font-bold text-lg text-dark mb-1">Burger Barn</h3>
         <div class="flex items-center mb-2"><span class="text-yellow-500">⭐</span> <span class="font-semibold text-dark ml-1">4.6</span> <span class="text-gray-400 text-sm ml-1">(512)</span>
         </div>
         <div class="flex items-center justify-between"><span class="text-sm text-gray-500">🕐 15-25 min</span> <span class="text-sm text-gray-500">💰 $1.99 delivery</span>
         </div><button class="w-full mt-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all"> View Menu </button>
        </div>
       </div>
       <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group cursor-pointer" onclick="navigateTo('restaurant', 3)">
        <div class="relative h-40 bg-gradient-to-br from-pink-400 to-rose-500 overflow-hidden">
         <div class="absolute inset-0 flex items-center justify-center text-6xl group-hover:scale-110 transition-transform">
          🍣
         </div>
         <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-full text-xs font-semibold text-green-600">
          Open
         </div>
        </div>
        <div class="p-5">
         <h3 class="font-bold text-lg text-dark mb-1">Sushi Supreme</h3>
         <div class="flex items-center mb-2"><span class="text-yellow-500">⭐</span> <span class="font-semibold text-dark ml-1">4.9</span> <span class="text-gray-400 text-sm ml-1">(289)</span>
         </div>
         <div class="flex items-center justify-between"><span class="text-sm text-gray-500">🕐 25-35 min</span> <span class="text-sm text-gray-500">💰 $3.99 delivery</span>
         </div><button class="w-full mt-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all"> View Menu </button>
        </div>
       </div>
       <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group cursor-pointer" onclick="navigateTo('restaurant', 4)">
        <div class="relative h-40 bg-gradient-to-br from-green-400 to-emerald-500 overflow-hidden">
         <div class="absolute inset-0 flex items-center justify-center text-6xl group-hover:scale-110 transition-transform">
          🥗
         </div>
         <div class="absolute top-3 right-3 bg-white px-2 py-1 rounded-full text-xs font-semibold text-green-600">
          Open
         </div>
        </div>
        <div class="p-5">
         <h3 class="font-bold text-lg text-dark mb-1">Green Garden</h3>
         <div class="flex items-center mb-2"><span class="text-yellow-500">⭐</span> <span class="font-semibold text-dark ml-1">4.7</span> <span class="text-gray-400 text-sm ml-1">(198)</span>
         </div>
         <div class="flex items-center justify-between"><span class="text-sm text-gray-500">🕐 15-20 min</span> <span class="text-sm text-gray-500">💰 $2.49 delivery</span>
         </div><button class="w-full mt-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all"> View Menu </button>
        </div>
       </div>
      </div>
     </div>
    </section><!-- Testimonials -->
    <section id="testimonials" class="py-20 bg-white">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16"><span class="inline-block px-4 py-2 bg-orange-100 text-primary font-semibold rounded-full text-sm mb-4">Customer Love</span>
       <h2 class="text-3xl sm:text-4xl font-extrabold text-dark mb-4">What Our Customers Say</h2>
       <p class="text-gray-600 max-w-2xl mx-auto">Join thousands of satisfied customers who trust FoodFlow</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
       <div class="bg-gradient-to-br from-orange-50 to-white rounded-3xl p-8 border border-orange-100 hover:shadow-xl transition-all">
        <div class="flex items-center text-yellow-500 mb-4">
         ⭐⭐⭐⭐⭐
        </div>
        <p class="text-gray-600 mb-6 italic">"FoodFlow has completely changed how I order food. The real-time tracking is amazing and the food always arrives hot!"</p>
        <div class="flex items-center">
         <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
          SK
         </div>
         <div class="ml-4">
          <h4 class="font-bold text-dark">Sarah K.</h4>
          <p class="text-sm text-gray-500">Verified Customer</p>
         </div>
        </div>
       </div>
       <div class="bg-gradient-to-br from-red-50 to-white rounded-3xl p-8 border border-red-100 hover:shadow-xl transition-all">
        <div class="flex items-center text-yellow-500 mb-4">
         ⭐⭐⭐⭐⭐
        </div>
        <p class="text-gray-600 mb-6 italic">"Best delivery app I've used. The variety of restaurants is incredible and the delivery fees are super reasonable."</p>
        <div class="flex items-center">
         <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold">
          MJ
         </div>
         <div class="ml-4">
          <h4 class="font-bold text-dark">Michael J.</h4>
          <p class="text-sm text-gray-500">Verified Customer</p>
         </div>
        </div>
       </div>
       <div class="bg-gradient-to-br from-green-50 to-white rounded-3xl p-8 border border-green-100 hover:shadow-xl transition-all">
        <div class="flex items-center text-yellow-500 mb-4">
         ⭐⭐⭐⭐⭐
        </div>
        <p class="text-gray-600 mb-6 italic">"I love how easy it is to reorder my favorites. The app remembers everything and makes ordering a breeze!"</p>
        <div class="flex items-center">
         <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
          EL
         </div>
         <div class="ml-4">
          <h4 class="font-bold text-dark">Emily L.</h4>
          <p class="text-sm text-gray-500">Verified Customer</p>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section><!-- Reviews & Ratings Section -->
    <section id="reviews-section" class="py-20 bg-gradient-to-br from-orange-50 to-red-50">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
       <span class="inline-block px-4 py-2 bg-white text-primary font-semibold rounded-full text-sm mb-4">Your Feedback</span>
       <h2 class="text-3xl sm:text-4xl font-extrabold text-dark mb-4">Share Your Experience</h2>
       <p class="text-gray-600 max-w-2xl mx-auto">Your feedback helps us improve. Rate the platform and share what you think!</p>
      </div>
      <div class="grid lg:grid-cols-3 gap-8">
       <!-- Leave a Review -->
       <div class="lg:col-span-1 bg-white rounded-3xl p-8 shadow-xl h-fit">
        <h3 class="text-xl font-bold text-dark mb-6">Leave a Review</h3>
        <form id="review-form" onsubmit="submitReview(event)" class="space-y-4">
         <!-- Name -->
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2" for="reviewer-name">Your Name</label> <input type="text" id="reviewer-name" placeholder="John Doe" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" required>
         </div><!-- Email -->
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2" for="reviewer-email">Email</label> <input type="email" id="reviewer-email" placeholder="john@example.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" required>
         </div><!-- Rating -->
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-3">Rate FoodFlow</label>
          <div class="flex gap-2" id="rating-selector">
           <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gray-100 hover:bg-yellow-100 transition-colors text-xl" data-rating="1">⭐</button> <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gray-100 hover:bg-yellow-100 transition-colors text-xl" data-rating="2">⭐</button> <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gray-100 hover:bg-yellow-100 transition-colors text-xl" data-rating="3">⭐</button> <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gray-100 hover:bg-yellow-100 transition-colors text-xl" data-rating="4">⭐</button> <button type="button" class="star-btn w-10 h-10 rounded-lg bg-gradient-to-r from-primary to-secondary transition-colors text-xl" data-rating="5">⭐</button>
          </div><input type="hidden" id="review-rating" value="5">
         </div><!-- Comment -->
         <div>
          <label class="block text-sm font-medium text-gray-700 mb-2" for="reviewer-comment">Your Comment</label> <textarea id="reviewer-comment" placeholder="Share your experience with FoodFlow..." rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none resize-none" required></textarea>
         </div><button type="submit" class="w-full py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all"> Submit Review </button>
        </form>
       </div><!-- Reviews Display -->
       <div class="lg:col-span-2">
        <div class="bg-white rounded-3xl p-8 shadow-xl">
         <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-bold text-dark">Recent Reviews</h3>
          <div class="flex items-center">
           <div class="text-3xl font-extrabold gradient-text">
            4.8
           </div>
           <div class="ml-3">
            <div class="text-yellow-500 text-sm">
             ⭐⭐⭐⭐⭐
            </div>
            <div class="text-xs text-gray-500 mt-1">
             Based on <span id="total-reviews">3</span> reviews
            </div>
           </div>
          </div>
         </div>
         <div id="reviews-container" class="space-y-4 max-h-96 overflow-y-auto hide-scrollbar">
          <!-- Default reviews -->
          <div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow">
           <div class="flex items-start justify-between mb-2">
            <div>
             <h4 class="font-semibold text-dark">Alex Rodriguez</h4>
             <p class="text-xs text-gray-500">2 days ago</p>
            </div><span class="text-yellow-500">⭐⭐⭐⭐⭐</span>
           </div>
           <p class="text-gray-600 text-sm">"Amazing app! The delivery speed is unbeatable and customer service is always helpful. Highly recommend!"</p>
          </div>
          <div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow">
           <div class="flex items-start justify-between mb-2">
            <div>
             <h4 class="font-semibold text-dark">Jessica Chen</h4>
             <p class="text-xs text-gray-500">1 week ago</p>
            </div><span class="text-yellow-500">⭐⭐⭐⭐</span>
           </div>
           <p class="text-gray-600 text-sm">"Great selection of restaurants and reasonable delivery fees. Would love to see more payment options."</p>
          </div>
          <div class="border border-gray-200 rounded-2xl p-4 hover:shadow-md transition-shadow">
           <div class="flex items-start justify-between mb-2">
            <div>
             <h4 class="font-semibold text-dark">Marcus Williams</h4>
             <p class="text-xs text-gray-500">2 weeks ago</p>
            </div><span class="text-yellow-500">⭐⭐⭐⭐⭐</span>
           </div>
           <p class="text-gray-600 text-sm">"The live tracking feature is incredible! I can see exactly where my food is at all times. Best ordering experience!"</p>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section><!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-primary to-secondary">
     <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-6">Ready to Order?</h2>
      <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">Join over 50,000 happy customers and start ordering your favorite meals today!</p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center"><button onclick="navigateTo('restaurants-list')" class="px-8 py-4 bg-white text-primary rounded-full font-bold text-lg hover:shadow-xl transition-all hover:-translate-y-1"> Order Now </button> <button class="px-8 py-4 bg-transparent text-white rounded-full font-bold text-lg border-2 border-white hover:bg-white/10 transition-all"> Learn More </button>
      </div>
     </div>
    </section><!-- Footer -->
    <footer class="bg-dark text-white py-16">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-4 gap-8 mb-12">
       <div>
        <div class="flex items-center mb-6">
         <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center"><span class="text-white text-xl">🍽️</span>
         </div><span class="ml-3 text-xl font-bold">FoodFlow</span>
        </div>
        <p class="text-gray-400">Delivering happiness to your doorstep, one meal at a time.</p>
       </div>
       <div>
        <h4 class="font-bold mb-4">Company</h4>
        <ul class="space-y-2 text-gray-400">
         <li><a href="#" class="hover:text-primary transition-colors">About Us</a></li>
         <li><a href="#" class="hover:text-primary transition-colors">Careers</a></li>
         <li><a href="#" class="hover:text-primary transition-colors">Press</a></li>
         <li><a href="#" class="hover:text-primary transition-colors">Blog</a></li>
        </ul>
       </div>
       <div>
        <h4 class="font-bold mb-4">Support</h4>
        <ul class="space-y-2 text-gray-400">
         <li><a href="#" class="hover:text-primary transition-colors">Help Center</a></li>
         <li><a href="#" class="hover:text-primary transition-colors">Contact Us</a></li>
         <li><a href="#" class="hover:text-primary transition-colors">Privacy Policy</a></li>
         <li><a href="#" class="hover:text-primary transition-colors">Terms of Service</a></li>
        </ul>
       </div>
       <div>
        <h4 class="font-bold mb-4">Connect</h4>
        <div class="flex space-x-4"><a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors"> <span>📘</span> </a> <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors"> <span>🐦</span> </a> <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors"> <span>📷</span> </a> <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors"> <span>💼</span> </a>
        </div>
        <div class="mt-6">
         <p class="text-gray-400 text-sm">Download our app</p>
         <div class="flex space-x-2 mt-2"><button class="px-4 py-2 bg-gray-800 rounded-lg text-sm hover:bg-gray-700 transition-colors">🍎 App Store</button> <button class="px-4 py-2 bg-gray-800 rounded-lg text-sm hover:bg-gray-700 transition-colors">🤖 Play Store</button>
         </div>
        </div>
       </div>
      </div>
      <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
       <p>© 2024 FoodFlow. All rights reserved.</p>
      </div>
     </div>
    </footer>
   </div><!-- Restaurants List Page -->
   <div id="restaurants-list-page" class="hidden pt-16 min-h-full bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
     <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
      <div>
       <h1 class="text-3xl font-extrabold text-dark">All Restaurants</h1>
       <p class="text-gray-600 mt-1">Browse our curated selection of restaurants</p>
      </div>
      <div class="mt-4 md:mt-0 flex items-center space-x-4">
       <div class="relative"><input type="text" placeholder="Search restaurants..." class="pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none w-64"> <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
       </div><select class="px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none bg-white"> <option>All Cuisines</option> <option>Pizza</option> <option>Burgers</option> <option>Sushi</option> <option>Salads</option> </select>
      </div>
     </div>
     <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="restaurants-grid"><!-- Restaurants populated by JS -->
     </div>
    </div>
   </div><!-- Restaurant Page -->
   <div id="restaurant-page" class="hidden pt-16 min-h-full bg-gray-50">
    <div id="restaurant-content"><!-- Content populated by JS -->
    </div>
   </div><!-- Checkout Page -->
   <div id="checkout-page" class="hidden pt-16 min-h-full bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8"><button onclick="goBack()" class="flex items-center text-gray-600 hover:text-primary mb-6 transition-colors">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg> Back </button>
     <h1 class="text-3xl font-extrabold text-dark mb-8">Checkout</h1>
     <div class="grid lg:grid-cols-3 gap-8">
      <div class="lg:col-span-2 space-y-6"><!-- Delivery Address -->
       <div class="bg-white rounded-2xl p-6 shadow-lg">
        <h2 class="text-xl font-bold text-dark mb-4 flex items-center"><span class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center mr-3 text-sm">1</span> Delivery Address</h2>
        <div class="grid md:grid-cols-2 gap-4">
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="full-name">Full Name</label> <input type="text" id="full-name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" placeholder="John Doe">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="phone">Phone Number</label> <input type="tel" id="phone" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" placeholder="+1 (555) 000-0000">
         </div>
         <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-2" for="address">Street Address</label> <input type="text" id="address" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" placeholder="123 Main Street, Apt 4B">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="city">City</label> <input type="text" id="city" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" placeholder="New York">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="zip">ZIP Code</label> <input type="text" id="zip" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" placeholder="10001">
         </div>
        </div>
       </div><!-- Payment Method -->
       <div class="bg-white rounded-2xl p-6 shadow-lg">
        <h2 class="text-xl font-bold text-dark mb-4 flex items-center"><span class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center mr-3 text-sm">2</span> Payment Method</h2>
        <p class="text-sm text-amber-600 bg-amber-50 rounded-lg p-3 mb-4 flex items-center"><span class="mr-2">⚠️</span> <span>Demo Mode: No actual payment will be processed</span></p>
        <div class="space-y-3"><label class="flex items-center p-4 border-2 border-primary rounded-xl bg-orange-50 cursor-pointer"> <input type="radio" name="payment" value="card" checked class="w-5 h-5 text-primary"> <span class="ml-3 font-medium">💳 Credit/Debit Card</span> </label> <label class="flex items-center p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-primary transition-colors"> <input type="radio" name="payment" value="paypal" class="w-5 h-5 text-primary"> <span class="ml-3 font-medium">🅿️ PayPal</span> </label> <label class="flex items-center p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-primary transition-colors"> <input type="radio" name="payment" value="cash" class="w-5 h-5 text-primary"> <span class="ml-3 font-medium">💵 Cash on Delivery</span> </label>
        </div>
        <div id="card-details" class="mt-6 grid md:grid-cols-2 gap-4">
         <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700 mb-2" for="card-number">Card Number</label> <input type="text" id="card-number" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" placeholder="1234 5678 9012 3456">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="expiry">Expiry Date</label> <input type="text" id="expiry" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" placeholder="MM/YY">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="cvv">CVV</label> <input type="text" id="cvv" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none" placeholder="123">
         </div>
        </div>
       </div>
      </div><!-- Order Summary -->
      <div>
       <div class="bg-white rounded-2xl p-6 shadow-lg sticky top-24">
        <h2 class="text-xl font-bold text-dark mb-4">Order Summary</h2>
        <div id="checkout-items" class="space-y-3 mb-4 max-h-64 overflow-y-auto hide-scrollbar"><!-- Items populated by JS -->
        </div>
        <div class="border-t pt-4 space-y-2">
         <div class="flex justify-between text-gray-600"><span>Subtotal</span> <span id="checkout-subtotal">$0.00</span>
         </div>
         <div class="flex justify-between text-gray-600"><span>Delivery Fee</span> <span>$2.99</span>
         </div>
         <div class="flex justify-between text-gray-600"><span>Service Fee</span> <span>$1.50</span>
         </div>
         <div class="flex justify-between font-bold text-lg text-dark pt-2 border-t"><span>Total</span> <span id="checkout-total">$0.00</span>
         </div>
        </div><button onclick="placeOrder()" class="w-full mt-6 py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-orange-200 transition-all"> Place Order </button>
        <p class="text-center text-sm text-gray-500 mt-4">🔒 Secure checkout powered by FoodFlow</p>
       </div>
      </div>
     </div>
    </div>
   </div><!-- Order Tracking Page -->
   <div id="tracking-page" class="hidden pt-16 min-h-full bg-gradient-to-br from-green-50 to-emerald-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
     <div class="text-center mb-8">
      <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse-slow"><span class="text-4xl">✓</span>
      </div>
      <h1 class="text-3xl font-extrabold text-dark">Order Confirmed!</h1>
      <p class="text-gray-600 mt-2">Order #FD<span id="order-number">123456</span></p>
     </div>
     <div class="bg-white rounded-3xl p-8 shadow-xl mb-8">
      <h2 class="text-xl font-bold text-dark mb-6">Order Status</h2>
      <div class="relative">
       <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-gray-200"></div>
       <div class="absolute left-6 top-0 w-0.5 bg-gradient-to-b from-green-500 to-primary transition-all duration-1000" id="progress-line" style="height: 25%;"></div>
       <div class="space-y-8">
        <div class="flex items-center relative" id="status-pending">
         <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center z-10 shadow-lg"><span class="text-white text-xl">✓</span>
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
     <div class="text-center"><button onclick="navigateTo('landing')" class="px-8 py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-full font-bold hover:shadow-lg transition-all"> Back to Home </button>
     </div>
    </div>
   </div><!-- Floating Cart Button (Mobile) -->
   <div id="floating-cart" class="fixed bottom-6 right-6 z-50 hidden"><button onclick="toggleCartSidebar()" class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-full shadow-xl flex items-center justify-center hover:scale-110 transition-transform"> <span class="text-2xl">🛒</span> <span id="floating-cart-count" class="absolute -top-1 -right-1 w-6 h-6 bg-secondary text-white rounded-full text-xs font-bold flex items-center justify-center">0</span> </button>
   </div><!-- Cart Sidebar -->
   <div id="cart-sidebar" class="fixed top-0 right-0 h-full w-full sm:w-96 bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300">
    <div class="flex flex-col h-full">
     <div class="flex items-center justify-between p-6 border-b">
      <h2 class="text-xl font-bold text-dark">Your Cart</h2><button onclick="toggleCartSidebar()" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center hover:bg-gray-200 transition-colors">
       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
       </svg></button>
     </div>
     <div id="cart-items" class="flex-1 overflow-y-auto p-6 space-y-4 hide-scrollbar"><!-- Cart items populated by JS -->
     </div>
     <div class="p-6 border-t bg-gray-50">
      <div class="flex justify-between mb-2"><span class="text-gray-600">Subtotal</span> <span id="cart-subtotal" class="font-semibold">$0.00</span>
      </div>
      <div class="flex justify-between mb-4"><span class="text-gray-600">Delivery</span> <span class="font-semibold">$2.99</span>
      </div>
      <div class="flex justify-between text-xl font-bold mb-4"><span>Total</span> <span id="cart-total">$2.99</span>
      </div><button onclick="goToCheckout()" id="checkout-btn" class="w-full py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-bold hover:shadow-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed" disabled> Proceed to Checkout </button>
     </div>
    </div>
   </div>
   <div id="cart-overlay" class="fixed inset-0 bg-black/50 z-40 hidden" onclick="toggleCartSidebar()"></div>
    <!-- Restaurant Registration Modal -->
   @include('customer interface.restaurant-register')
   <!-- Contact Info Section -->
      <div>
       <h3 class="text-lg font-bold text-dark mb-4 flex items-center"><span class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center mr-3 text-sm font-bold">2</span> Contact Information</h3>
       <div class="space-y-4">
        <div><label class="block text-sm font-medium text-gray-700 mb-2" for="owner-name">Owner/Manager Name *</label> <input type="text" id="owner-name" required placeholder="John Doe" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
        </div>
        <div class="grid sm:grid-cols-2 gap-4">
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="owner-email">Email Address *</label> <input type="email" id="owner-email" required placeholder="john@restaurant.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="owner-phone">Phone Number *</label> <input type="tel" id="owner-phone" required placeholder="+1 (555) 000-0000" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
         </div>
        </div>
       </div>


      </div><!-- Location Section -->
      <div>
       <h3 class="text-lg font-bold text-dark mb-4 flex items-center"><span class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center mr-3 text-sm font-bold">3</span> Restaurant Location</h3>
       <div class="space-y-4">
        <div><label class="block text-sm font-medium text-gray-700 mb-2" for="rest-address">Street Address *</label> <input type="text" id="rest-address" required placeholder="123 Main Street" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
        </div>
        <div class="grid sm:grid-cols-3 gap-4">
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="rest-city">City *</label> <input type="text" id="rest-city" required placeholder="New York" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="rest-state">State/Province *</label> <input type="text" id="rest-state" required placeholder="NY" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2" for="rest-zip">ZIP Code *</label> <input type="text" id="rest-zip" required placeholder="10001" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:outline-none">
         </div>
        </div>
       </div>
      </div><!-- Terms -->
      <div class="bg-orange-50 rounded-xl p-4 border border-orange-200"><label class="flex items-start"> <input type="checkbox" id="terms-agree" required class="w-5 h-5 text-primary rounded mt-1"> <span class="ml-3 text-sm text-gray-700">I agree to FoodFlow's <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a href="#" class="text-primary hover:underline">Partner Agreement</a></span> </label>
      </div><!-- Submit Buttons -->
      <div class="flex gap-4"><button type="button" onclick="closeRestaurantRegister()" class="flex-1 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-colors"> Cancel </button> <button type="submit" class="flex-1 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold hover:shadow-lg transition-all"> Submit Registration </button>
      </div>
     </form>
    </div>
   </div>
  </div>
 
 
<script>
document.getElementById('cta-secondary-btn').addEventListener('click', () => {
    openRestaurantRegister();
});
</script>

@endsection