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
    </section>