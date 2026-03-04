<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodFlow - Order Your Favorite Meals Online</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#f97316',
            'primary-dark': '#ea580c',
            secondary: '#ef4444',
            accent: '#fef3c7',
            dark: '#1f2937',
            light: '#f9fafb'
          }
        }
      }
    }
  </script>
 <link rel="stylesheet" href="{{ asset('css/customer_interface.css') }}">
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
<body class="h-full bg-white text-gray-800 overflow-auto">



    <!-- Main content -->
    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow p-4 mt-8 text-center text-sm text-gray-500">
        &copy; 2026 FoodFlow. All rights reserved.
    </footer>

</body>
</html>