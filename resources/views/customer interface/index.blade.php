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
         <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center"><span class="text-white text-xl"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 text-white"><path fill="currentColor" d="M48 384c-8.8 0-16 7.2-16 16 0 44.2 35.8 80 80 80l288 0c44.2 0 80-35.8 80-80 0-8.8-7.2-16-16-16L48 384zM32 202c0 12.2 9.9 22 22 22L458 224c12.2 0 22-9.9 22-22 0-17.2-2.6-34.4-10.8-49.5-22.2-40.8-82.3-120.5-213.2-120.5S65 111.6 42.8 152.5C34.6 167.6 32 184.8 32 202zM0 304c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 272c-17.7 0-32 14.3-32 32zM256 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM120 128a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm248-24a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></span>
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
        <div class="flex space-x-4">
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors"> <span class="text-white"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M80 299.3l0 212.7 116 0 0-212.7 86.5 0 18-97.8-104.5 0 0-34.6c0-51.7 20.3-71.5 72.7-71.5 16.3 0 29.4 .4 37 1.2l0-88.7C291.4 4 256.4 0 236.2 0 129.3 0 80 50.5 80 159.4l0 42.1-66 0 0 97.8 66 0z"/></svg></span> </a> 
        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors"> <span class="text-white"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M224.3 141a115 115 0 1 0 -.6 230 115 115 0 1 0 .6-230zm-.6 40.4a74.6 74.6 0 1 1 .6 149.2 74.6 74.6 0 1 1 -.6-149.2zm93.4-45.1a26.8 26.8 0 1 1 53.6 0 26.8 26.8 0 1 1 -53.6 0zm129.7 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM399 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></span> </a> 
        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors"> <span class="text-white"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M357.2 48L427.8 48 273.6 224.2 455 464 313 464 201.7 318.6 74.5 464 3.8 464 168.7 275.5-5.2 48 140.4 48 240.9 180.9 357.2 48zM332.4 421.8l39.1 0-252.4-333.8-42 0 255.3 333.8z"/></svg></span> </a> 
        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors"> <span class="text-white"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M100.3 448l-92.9 0 0-299.1 92.9 0 0 299.1zM53.8 108.1C24.1 108.1 0 83.5 0 53.8 0 39.5 5.7 25.9 15.8 15.8s23.8-15.8 38-15.8 27.9 5.7 38 15.8 15.8 23.8 15.8 38c0 29.7-24.1 54.3-53.8 54.3zM447.9 448l-92.7 0 0-145.6c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7l0 148.1-92.8 0 0-299.1 89.1 0 0 40.8 1.3 0c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3l0 164.3-.1 0z"/></svg></span> </a>
        </div>
        <div class="mt-6">
         <p class="text-gray-400 text-sm">Download our app</p>
         <div class="flex space-x-2 mt-2"><button class="px-4 py-2 bg-gray-800 rounded-lg text-sm hover:bg-gray-700 transition-colors flex flex-row"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M255.9 120.9l9.1-15.7c5.6-9.8 18.1-13.1 27.9-7.5s13.1 18.1 7.5 27.9l-87.5 151.5 63.3 0c20.5 0 32 24.1 23.1 40.8l-185.5 0c-11.3 0-20.4-9.1-20.4-20.4s9.1-20.4 20.4-20.4l52 0 66.6-115.4-20.8-36.1c-5.6-9.8-2.3-22.2 7.5-27.9 9.8-5.6 22.2-2.3 27.9 7.5l8.9 15.7zm-78.7 218l-19.6 34c-5.6 9.8-18.1 13.1-27.9 7.5s-13.1-18.1-7.5-27.9l14.6-25.2c16.4-5.1 29.8-1.2 40.4 11.6zm168.9-61.7l53.1 0c11.3 0 20.4 9.1 20.4 20.4S410.5 318 399.2 318l-29.5 0 19.9 34.5c5.6 9.8 2.3 22.2-7.5 27.9-9.8 5.6-22.2 2.3-27.9-7.5-33.5-58.1-58.7-101.6-75.4-130.6-17.1-29.5-4.9-59.1 7.2-69.1 13.4 23 33.4 57.7 60.1 104zM256 8a248 248 0 1 0 0 496 248 248 0 1 0 0-496zM40 256a216 216 0 1 1 432 0 216 216 0 1 1 -432 0z"/></svg> App Store</button> 
         <button class="px-4 py-2 bg-gray-800 rounded-lg text-sm hover:bg-gray-700 transition-colors flex flex-row"><svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M293.6 234.3L72.9 13 353.7 174.2 293.6 234.3zM15.3 0C2.3 6.8-6.4 19.2-6.4 35.3l0 441.3c0 16.1 8.7 28.5 21.7 35.3L271.9 255.9 15.3 0zM440.5 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM72.9 499L353.7 337.8 293.6 277.7 72.9 499z"/></svg> Play Store</button>
         </div>
        </div>
       </div>
      </div>
      <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
       <p>© 2026 FoodFlow. All rights reserved.</p>
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