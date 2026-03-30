  <div id="page-settings" class="page hidden">
      <div class="max-w-2xl">
       <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="p-6 border-b border-gray-100">
         <h3 class="font-bold text-gray-800 text-lg">Restaurant Profile</h3>
        </div>
        <div class="p-6 space-y-4">
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Restaurant Name</label> <input type="text" value="FoodHub Restaurant" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label> <input type="email" value="contact@foodhub.com" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label> <input type="tel" value="+1 (555) 123-4567" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
         </div>
         <div><label class="block text-sm font-medium text-gray-700 mb-2">Address</label> <textarea rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">123 Food Street, Culinary District, FC 12345</textarea>
         </div>
        </div>
       </div>
       <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="p-6 border-b border-gray-100">
         <h3 class="font-bold text-gray-800 text-lg">Notifications</h3>
        </div>
        <div class="p-6 space-y-4">
         <div class="flex items-center justify-between">
          <div>
           <p class="font-medium text-gray-800">New Order Alerts</p>
           <p class="text-sm text-gray-400">Get notified when new orders arrive</p>
          </div><button onclick="toggleSwitch(this)" class="w-12 h-6 bg-orange-500 rounded-full relative transition-colors"> <span class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full transition-transform"></span> </button>
         </div>
         <div class="flex items-center justify-between">
          <div>
           <p class="font-medium text-gray-800">Review Notifications</p>
           <p class="text-sm text-gray-400">Get notified when customers leave reviews</p>
          </div><button onclick="toggleSwitch(this)" class="w-12 h-6 bg-orange-500 rounded-full relative transition-colors"> <span class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full transition-transform"></span> </button>
         </div>
         <div class="flex items-center justify-between">
          <div>
           <p class="font-medium text-gray-800">Daily Summary</p>
           <p class="text-sm text-gray-400">Receive daily sales summary</p>
          </div><button onclick="toggleSwitch(this)" class="w-12 h-6 bg-gray-300 rounded-full relative transition-colors"> <span class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform"></span> </button>
         </div>
        </div>
       </div><button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition-colors shadow-lg shadow-orange-200"> Save Changes </button>
      </div>
     </div>
    </div>