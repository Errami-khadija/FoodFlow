@extends('layouts.homeLayout')

@section('content')
  
  <!-- Landing Page -->
   <div id="landing-page" class="pt-16">
    <!-- Hero Section -->
    @include('customer interface.hero-section')
    <!-- How It Works -->
    @include('customer interface.how-it-works')
    <!-- Featured Restaurants -->
    @include('customer interface.featured-restaurants')
    <!-- Testimonials -->
    @include('customer interface.testimonials')
    <!-- Reviews & Ratings Section -->
    @include('customer interface.review')
    <!-- CTA Section -->
     @include('customer interface.cta-section')
   <!-- Footer -->
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
   </div>

   
   <!-- Checkout Page -->
    @include('customer interface.checkout')
   <!-- Order Tracking Page -->
   @include('customer interface.order-tracking')
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
   </div>
  </div>
 
 
<script>
document.getElementById('cta-secondary-btn').addEventListener('click', () => {
    openRestaurantRegister();
});
</script>

@endsection