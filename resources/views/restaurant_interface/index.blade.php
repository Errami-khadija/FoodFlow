<!doctype html>
<html lang="en" class="h-full">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Dashboard</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'dm': ['DM Sans', 'sans-serif']
          },
          colors: {
            orange: {
              50: '#fff7ed',
              100: '#ffedd5',
              200: '#fed7aa',
              300: '#fdba74',
              400: '#fb923c',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
              800: '#9a3412',
              900: '#7c2d12'
            }
          }
        }
      }
    }
  </script>
<link rel="stylesheet" href="/css/restaurant_interface.css">
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body class="h-full bg-gray-50 font-dm overflow-hidden">
  <div id="app" class="h-full flex"><!-- Mobile Overlay -->
   <div id="mobile-overlay" class="overlay fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div><!-- Sidebar -->
  <!-- Include Sidebar -->
    @include('partials.restaurant_aside')
   <!-- Main Content -->
   <main class="flex-1 flex flex-col h-full overflow-hidden"><!-- Header -->
   <!-- Include Header -->
    @include('partials.restaurant_header') 
   <!-- Page Content -->
    <div id="page-content" class="flex-1 overflow-y-auto p-4 lg:p-8">
       {{-- Load the section dynamically --}}
    @include($section)
   </main>
  </div><!-- Add Item Modal -->
  <div id="add-item-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
   <div class="bg-white rounded-2xl w-full max-w-md max-h-[90%] overflow-y-auto">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
     <h3 class="font-bold text-gray-800 text-lg">Add New Menu Item</h3><button onclick="closeModal('add-item-modal')" class="p-2 hover:bg-gray-100 rounded-lg">
      <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg></button>
    </div>
    <form id="add-item-form" class="p-6 space-y-4">
     <div><label class="block text-sm font-medium text-gray-700 mb-2">Item Name</label> <input type="text" name="name" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="e.g., Margherita Pizza">
     </div>
     <div><label class="block text-sm font-medium text-gray-700 mb-2">Description</label> <textarea name="description" rows="2" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Brief description of the item"></textarea>
     </div>
     <div class="grid grid-cols-2 gap-4">
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label> <input type="number" name="price" step="0.01" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="12.99">
      </div>
      <div><label class="block text-sm font-medium text-gray-700 mb-2">Category</label> <select name="category" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500"> <option>Main Course</option> <option>Appetizers</option> <option>Desserts</option> <option>Beverages</option> </select>
      </div>
     </div>
     <div><label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
      <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-orange-300 transition-colors cursor-pointer">
       <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
       </svg>
       <p class="text-sm text-gray-400">Click to upload image</p>
      </div>
     </div><button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-medium transition-colors"> Add Item </button>
    </form>
   </div>
  </div><!-- Order Detail Modal -->
  <div id="order-detail-modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
   <div class="bg-white rounded-2xl w-full max-w-md">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
     <h3 class="font-bold text-gray-800 text-lg">Order Details</h3><button onclick="closeModal('order-detail-modal')" class="p-2 hover:bg-gray-100 rounded-lg">
      <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg></button>
    </div>
    <div id="order-detail-content" class="p-6">
    </div>
   </div>
  </div><!-- Toast Notification -->
  <div id="toast" class="fixed bottom-4 right-4 bg-gray-800 text-white px-6 py-3 rounded-xl shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 z-50"><span id="toast-message">Action completed</span>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('js/restaurant_interface.js') }}"></script>
  </body>
</html>