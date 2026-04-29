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

   </div>
   
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