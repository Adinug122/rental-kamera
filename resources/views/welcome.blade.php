<x-layouts.app>
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-16 lg:px-8 mt-5 lg:-mt-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                <div class="max-w-xl -mt-10 ">
                    <h1 class="text-6xl md:text-7xl lg:text-8xl font-bold text-gray-900 mb-8 font-playfair leading-tight">
                        <span class="block">Capture</span>
                        <span class="block">The Moment</span>
                    </h1>
                    
                    <p class="text-base md:text-lg text-gray-700 mb-8 leading-relaxed">
                        Dari momen sederhana hingga cerita besar, kami hadir dengan kamera dan perlengkapan terbaik agar setiap bidikanmu tampil maksimal
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a class="inline-block rounded-xl bg-black px-8 py-3 text-center font-medium text-white shadow-sm transition-colors hover:bg-gray-800" 
                           href="#">
                            Book Now
                        </a>
                        
                        <a class="inline-block rounded-xl border border-black px-8 py-3 text-center font-medium text-gray-700 shadow-sm transition-colors hover:bg-gray-50 hover:text-gray-900" 
                           href="#">
                            Price List
                        </a>
                    </div>
                </div>
                
               
                <div class="flex justify-center lg:justify-end">
                       <div class="relative w-full max-w-2xl">
                        <img src="{{ asset('img/hero.png') }}" 
                             alt="Sony Alpha Camera" 
                             class="w-full h-auto object-contain drop-shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>