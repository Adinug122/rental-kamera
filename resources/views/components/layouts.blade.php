<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

            
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-50 text-gray-800 font-sans antialiased">
        
            <main class="flex-1 flex flex-col overflow-hidden bg-gray-50">
                {{ $slot }}
            </main>
            </div>
        </div>
    </body>
     
</html>
