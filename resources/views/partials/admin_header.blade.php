 <header class="bg-white border-b border-gray-200 px-4 lg:px-8 py-4 flex-shrink-0">
     <div class="flex items-center justify-between">
      <div class="flex items-center gap-4">
       <!-- Mobile Menu Button --> <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg></button>
       <div>
        <h2 id="page-title" class="text-xl lg:text-2xl font-bold text-gray-900">Dashboard Overview</h2>
        <p class="text-sm text-gray-500">Welcome back, Super Admin</p>
       </div>
      </div>
      <div class="flex items-center gap-3 lg:gap-4">
       <!-- Search (hidden on mobile) -->
       <div class="hidden md:flex items-center bg-gray-100 rounded-xl px-4 py-2">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg><input type="text" placeholder="Search..." class="bg-transparent border-none outline-none ml-2 w-48 text-sm">
       </div><!-- Notifications --> <button class="relative p-2 rounded-xl hover:bg-gray-100">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg><span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span> </button> <!-- Profile -->
       <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center text-white font-bold">
         SA
        </div>
        <div class="hidden lg:block">
         <p class="text-sm font-semibold text-gray-900">Admin User</p>
         <p class="text-xs text-gray-500">Super Admin</p>
        </div>
       </div>
      </div>
     </div>
    </header>