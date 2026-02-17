<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

            
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display:none !important; }
        body{
             overflow-y:scroll  
        }
       
    </style>

</head>
    <body class="font-sans antialiased ">
        <div class=" text-gray-800 font-sans antialiased">
            @include('components.navbar')
            <main class="flex-1 flex flex-col overflow-hidden ">
                {{ $slot }}
            </main>
            @include('components.footer')
            </div>
        </div>
        
    <script>
        const container = document.getElementById('testimonial-container');
        const dots = document.querySelectorAll('.dot'); 

        function scrollToCard(index) {
            const card = container.querySelector('.flex-none');
            const gap = 32;
            const cardWidth = card.offsetWidth + gap;
            container.scrollTo({
                left: index * cardWidth,
                behavior: 'smooth'
            });
        }

        // Logic ganti warna dot saat scroll
        container.addEventListener('scroll', () => {
            const scrollLeft = container.scrollLeft;
            const scrollWidth = container.scrollWidth;
            const clientWidth = container.clientWidth;
            const card = container.querySelector('.flex-none');
            
            if (card) {
                const gap = 32;
                const cardWidth = card.offsetWidth + gap;
                
                const isAtEnd = scrollLeft + clientWidth >= scrollWidth - 10;
                
                let activeIndex;
                if (isAtEnd) {
                    activeIndex = dots.length - 1;
                } else {
                    // Kalau belum, hitung berdasarkan posisi scroll
                    activeIndex = Math.round(scrollLeft / cardWidth);
                }

                dots.forEach((dotItem, index) => {
                    if (index === activeIndex) {
                        dotItem.classList.add('bg-gray-800');
                        dotItem.classList.remove('border-2', 'border-gray-400');
                    } else {
                        dotItem.classList.remove('bg-gray-800');
                        dotItem.classList.add('border-2', 'border-gray-400');
                    }
                });
            }
        });
    </script>
    </body>
     
</html>
