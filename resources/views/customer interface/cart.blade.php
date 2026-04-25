<!-- Floating Cart Button (Mobile) -->
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
      </div>
      <button onclick="goToCheckout()" id="checkout-btn" class="w-full py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-bold hover:shadow-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed" disabled> Proceed to Checkout </button>
     </div>
    </div>
   </div>
   <div id="cart-overlay" class="fixed inset-0 bg-black/50 z-40 hidden" onclick="toggleCartSidebar()"></div>
   