<x-layouts.app>
    <x-hero></x-hero>
    <x-about></x-about>
    <x-product :produk="$produk"></x-product>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 font-playfair mb-4">Testimoni Pelanggan</h2>
            <p class="text-lg text-gray-600">Bukti Nyata Kepuasan Pelanggan</p>
        </div>

        <div id="testimonial-container"
            class="flex overflow-x-auto gap-8 pb-16 snap-x snap-mandatory scroll-smooth no-scrollbar">
            
            @foreach ($testimoni as $item)
                <div class="flex-none w-[85%] md:w-[calc((100%-64px)/3)] snap-start flex flex-col h-auto">
                    
                    <div class="bg-[#333333] rounded-2xl p-8 relative text-white leading-relaxed flex-grow shadow-md">
                        <svg class="w-12 h-12 text-gray-500 mb-6 opacity-60" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M10 8v8h6v10h-12v-10l4-8h2zm14 0v8h6v10h-12v-10l4-8h2z"></path>
                        </svg>
                        <p class="text-sm md:text-base italic leading-relaxed">
                            "{{ $item->isi_pesan }}"
                        </p>
                    </div>

                    <div class="ml-12 w-0 h-0 border-l-[15px] border-r-[15px] border-t-[20px] border-l-transparent border-r-transparent border-t-[#333333]">
                    </div>

                    <div class="flex items-center mt-6 ml-6">
                        <img src="{{ asset('storage/' . $item->foto) }}"
                            class="w-12 h-12 rounded-full border-2 border-gray-200 mr-4 object-cover">
                        <h4 class="font-bold text-gray-900 text-sm md:text-base">{{ $item->nama_user }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="dots-container" class="flex justify-center items-center space-x-3 -mt-8">
            @foreach ($testimoni as $index => $item)
                <button class="dot w-2.5 h-2.5 rounded-full transition-colors duration-300 
                        {{ $index === 0 ? 'bg-gray-800' : 'border-2 border-gray-400' }}"
                    onclick="scrollToCard({{ $index }})">
                </button>
            @endforeach
        </div>

    </div>
</section>


    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-20">
                <h2 class="text-4xl font-bold text-gray-900 font-playfair">Cara Booking</h2>
            </div>

            <div class="relative">

                <div class="absolute top-5 left-0 w-full h-1 bg-black hidden md:block z-0"></div>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-10 relative z-10">

                    <div class="flex flex-col items-start md:items-start">
                        <div
                            class="bg-black text-white w-10 h-10 flex items-center justify-center rounded-sm font-bold mb-6">
                            1
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Pilih Peralatan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Telusuri katalog peralatan yang tersedia dan pilih kamera, lensa, atau aksesoris sesuai
                            dengan kebutuhan fotografi maupun videografi Anda.
                        </p>
                    </div>

                    <div class="flex flex-col items-start">
                        <div
                            class="bg-black text-white w-10 h-10 flex items-center justify-center rounded-sm font-bold mb-6">
                            2
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Tentukan Tanggal</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Pilih tanggal mulai dan tanggal pengembalian untuk memastikan ketersediaan peralatan yang
                            ingin disewa.
                        </p>
                    </div>

                    <div class="flex flex-col items-start">
                        <div
                            class="bg-black text-white w-10 h-10 flex items-center justify-center rounded-sm font-bold mb-6">
                            3
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Isi Data</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                           Masuk atau daftar akun untuk melanjutkan pemesanan. Data profil Anda akan membantu kami memproses verifikasi sewa dengan lebih cepat, aman, dan terpercaya.
                        </p>
                    </div>

                    <div class="flex flex-col items-start">
                        <div
                            class="bg-black text-white w-10 h-10 flex items-center justify-center rounded-sm font-bold mb-6">
                            4
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Pembayaran</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Selesaikan pembayaran melalui metode yang tersedia sesuai dengan total biaya sewa yang
                            ditampilkan.
                        </p>
                    </div>

                    <div class="flex flex-col items-start">
                        <div
                            class="bg-black text-white w-10 h-10 flex items-center justify-center rounded-sm font-bold mb-6">
                            5
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Terima Peralatan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Peralatan dapat diambil langsung atau dikirim sesuai pilihan, dan siap digunakan untuk
                            mendukung momen terbaik Anda.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-12">
                <h2 class="text-sm font-bold text-gray-400 tracking-[0.2em] uppercase">
                    Brands
                </h2>
            </div>

            <div
                class="flex flex-wrap items-center justify-center gap-12 md:gap-20 opacity-50 grayscale transition-all duration-500 hover:grayscale-0">
                <img src="{{ asset('img/aputure.png') }}" alt="Aputure" class="h-8 md:h-10 object-contain">
                <img src="{{ asset('img/sony.png') }}" alt="Sony" class="h-6 md:h-8 object-contain">
                <img src="{{ asset('img/canon.png') }}" alt="Canon" class="h-10 md:h-12 object-contain">
                <img src="{{ asset('img/fujifilm.png') }}" alt="Fujifilm" class="h-6 md:h-8 object-contain">
                <img src="{{ asset('img/godox.png') }}" alt="Godox" class="h-8 md:h-10 object-contain">
            </div>

            <div class="text-center mt-12">
                <p class="text-sm text-[#474747] tracking-widest ">
                    and many more
                </p>
            </div>

        </div>
    </section>

    <section class="relative mt-5 overflow-hidden">
        <img src="{{ asset('img/background.png') }}" alt="bg" class="w-full h-[450px] object-cover">

        <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center text-center px-4">

            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight">
                Hubungi Kami
            </h2>

            <p class="text-lg md:text-xl text-white/90 max-w-2xl leading-relaxed">
                Hubungi kami jika Anda membutuhkan bantuan atau ingin melakukan booking.
            </p>

        </div>
    </section>

 <section id="contact" class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-center text-sm tracking-[0.2em] text-[#393939] font-bold uppercase">
            Contact
        </h2>

        <h3 class="text-center text-3xl md:text-4xl tracking-tight pt-5 font-bold text-black leading-tight">
            Tim Kami Melayani Anda 24 Jam
        </h3>

        <div class="max-w-3xl mx-auto text-center mt-6">
            <p class="text-gray-500 leading-relaxed text-lg">
                Hubungi kami untuk mendapatkan informasi lengkap mengenai ketersediaan peralatan,
                durasi sewa, serta detail harga yang sesuai dengan kebutuhan Anda.
            </p>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-10 gap-5">
            <div class="bg-[#333333] p-12 rounded-2xl flex flex-col items-center min-h-80 justify-center text-center shadow-lg">
                <div class="mb-6">
                    <img src="{{ asset('img/phone.png') }}" alt="phone icon" class="w-16 h-auto">
                </div>
                <h4 class="text-white text-3xl font-bold mb-4 tracking-tight">
                    Phone
                </h4>
                <p class="text-white/90 text-sm md:text-base tracking-[0.1em]">
                    +62 882 098 879
                </p>
            </div>
            
            <div class="bg-[#333333] p-12 rounded-2xl flex flex-col items-center min-h-80 justify-center text-center shadow-lg">
                <div class="mb-6">
                    <img src="{{ asset('img/mail.png') }}" alt="phone icon" class="w-16 h-auto">
                </div>
                <h4 class="text-white text-3xl font-bold mb-4 tracking-tight">
                    Email
                </h4>
                <p class="text-white/90 text-sm md:text-base tracking-[0.1em]">
                    lens_id1922@gmail.com
                </p>
            </div>
            
            <div class="bg-[#333333] p-12 rounded-2xl flex flex-col items-center min-h-80 justify-center text-center shadow-lg">
                <div class="mb-6">
                    <img src="{{ asset('img/map.png') }}" alt="phone icon" class="w-16 h-auto">
                </div>
                <h4 class="text-white text-3xl font-bold mb-4 tracking-tight">
                    Head Office
                </h4>
                <p class="text-white/90 text-sm md:text-base tracking-[0.1em]">
                    Jl. Jawa, Madiun, Indonesia
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63273.58086702423!2d111.44630538370859!3d-7.618557566871289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be5a6e55415b%3A0xf331b49b042f57b4!2sMADIUN%20KAMERA.%20Rental%20kamera!5e0!3m2!1sid!2sid!4v1769780562027!5m2!1sid!2sid"
            class="w-full h-[350px] md:h-[400px] rounded-lg shadow-lg" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>
<section id="contact" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div>
                <h2 class="text-4xl font-bold text-black mb-4">Kirim Pesan Email</h2>
                <p class="text-gray-400 text-sm mb-8 leading-relaxed max-w-md">
                    Hubungi kami jika Anda memerlukan bantuan dalam memilih kamera, lensa, atau aksesoris yang tepat untuk kebutuhan fotografi dan videografi Anda.
                </p>

      <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 z-50">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
        
        @if (session('success'))
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-init="setTimeout(() => show = false, 5000)"
                 x-transition:enter="transform ease-out duration-300 transition"
                 x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                 x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                 class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl bg-white border border-gray-200 shadow-2xl ring-1 ring-gray-400/20">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-bold text-gray-900">Berhasil Terkirim!</p>
                            <p class="mt-1 text-sm text-gray-500">{{ session('success') }}</p>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button @click="show = false" type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-600 focus:outline-none">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div x-data="{ show: true }" 
                 x-show="show"
                 class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl bg-white border border-red-100 shadow-2xl ring-1 ring-red-500/10">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-bold text-red-600">Terjadi Kesalahan</p>
                            <ul class="mt-1 text-xs text-gray-500 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button @click="show = false" type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-600">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-black mb-2">Nama</label>
                        <input type="text" name="nama" class="w-full border border-gray-300 rounded-md py-3 px-4 focus:outline-none focus:ring-1 focus:ring-black">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-black mb-2">Alamat Email</label>
                        <input type="email" name="email" class="w-full border border-gray-300 rounded-md py-3 px-4 focus:outline-none focus:ring-1 focus:ring-black">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-black mb-2">Pesan</label>
                        <textarea rows="5" name="pesan" class="w-full border border-gray-300 rounded-md py-3 px-4 focus:outline-none focus:ring-1 focus:ring-black"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-black text-white font-bold py-4 rounded-md hover:bg-gray-800 transition-all tracking-widest uppercase text-sm">
                        Kirim
                    </button>
                </form>
            </div>

            <div class="hidden lg:flex justify-center">
                <div class="relative w-[500px] h-[500px] bg-gray-200 rounded-full overflow-hidden">
                    <img src="{{ asset('img/customer-service.png') }}" alt="Customer Service" class="w-full h-full object-cover">
                </div>
            </div>

        </div>
    </div>
</section>

<footer class="bg-[#333333] pt-20 pb-10 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-20">
            
            <div class="space-y-6">
                <h2 class="text-5xl font-playfair font-bold italic">Lens.id</h2>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Lens.id lahir dari keyakinan bahwa setiap momen layak diabadikan. Kami menyediakan layanan sewa peralatan fotografi dan videografi profesional yang mudah diakses dan terpercaya.
                </p>
            </div>

            <div class="space-y-6 font-inter    ">
                <h3 class="text-xl font-bold">Contact Us</h3>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li class="flex flex-col">
                        <span class="text-white font-bold">Whatsapp +62 882 098 879 (24 Hours)</span>
                    </li>
                    <li>lens_id1922@gmail.com</li>
                    <li>Madiun, Jawa Timur</li>
                    <li>Kritik & Saran +62 882 356 765 (WA)</li>
                </ul>
            </div>

            <div class="space-y-6">
                <h3 class="text-xl font-bold">Sosial Media :</h3>
                <div class="flex space-x-6">
                    <a href="#" class="text-white hover:text-gray-400 transition-colors">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="#" class="text-white hover:text-gray-400 transition-colors">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="text-white hover:text-gray-400 transition-colors">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.86-.6-4.12-1.31a6.417 6.417 0 01-1.87-1.56l-.04 7.81c0 2.29-.63 4.47-1.92 6.27-1.32 1.81-3.32 3.13-5.39 3.51-2.17.4-4.54-.05-6.39-1.28-1.82-1.22-3.13-3.23-3.51-5.4-.41-2.19.04-4.56 1.26-6.42 1.21-1.85 3.23-3.17 5.42-3.56a8.07 8.07 0 01 3.9.21v4.11c-1.16-.41-2.48-.48-3.67-.18-1.22.31-2.28 1.1-2.91 2.16-.62 1.05-.8 2.37-.47 3.56.32 1.19 1.12 2.22 2.15 2.82.99.59 2.19.78 3.3.52 1.11-.26 2.06-.98 2.61-1.95.42-.74.63-1.58.63-2.43V.02z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 pt-8 text-center text-xs text-gray-500">
            <p>&copy; Copyright 2026 Lens.id</p>
        </div>
    </div>
</footer>
</x-layouts.app>