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
      </div>
      <!-- Order Summary -->
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
   </div>