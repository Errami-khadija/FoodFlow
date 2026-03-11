<!doctype html>
<html lang="en" class="h-full">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodFlow Admin Panel</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'jakarta': ['Plus Jakarta Sans', 'sans-serif']
          }
        }
      }
    }
  </script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">

 </head>
 <body class="h-full bg-gray-50">
    @yield('content')

     <script src="{{ asset('js/admin_panel.js') }}"></script>
</body>
</html>