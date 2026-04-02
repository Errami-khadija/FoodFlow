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