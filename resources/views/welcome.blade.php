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

                        <div
                            class="ml-12 w-0 h-0 border-l-[15px] border-r-[15px] border-t-[20px] border-l-transparent border-r-transparent border-t-[#333333]">
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
                            Masuk atau daftar akun untuk melanjutkan pemesanan. Data profil Anda akan membantu kami
                            memproses verifikasi sewa dengan lebih cepat, aman, dan terpercaya.
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
                <div
                    class="bg-[#333333] p-12 rounded-2xl flex flex-col items-center min-h-80 justify-center text-center shadow-lg">
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

                <div
                    class="bg-[#333333] p-12 rounded-2xl flex flex-col items-center min-h-80 justify-center text-center shadow-lg">
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

                <div
                    class="bg-[#333333] p-12 rounded-2xl flex flex-col items-center min-h-80 justify-center text-center shadow-lg">
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
                class="w-full h-[350px] md:h-[400px] rounded-lg shadow-lg" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div>
                    <h2 class="text-4xl font-bold text-black mb-4">Kirim Pesan Email</h2>
                    <p class="text-gray-400 text-sm mb-8 leading-relaxed max-w-md">
                        Hubungi kami jika Anda memerlukan bantuan dalam memilih kamera, lensa, atau aksesoris yang tepat
                        untuk kebutuhan fotografi dan videografi Anda.
                    </p>

                    <div aria-live="assertive"
                        class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 z-50">
                        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">

                            @if (session('success'))
                                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                                    x-transition:enter="transform ease-out duration-300 transition"
                                    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                                    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                                    class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl bg-white border border-gray-200 shadow-2xl ring-1 ring-gray-400/20">
                                    <div class="p-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                                <p class="text-sm font-bold text-gray-900">Berhasil Terkirim!</p>
                                                <p class="mt-1 text-sm text-gray-500">{{ session('success') }}</p>
                                            </div>
                                            <div class="ml-4 flex flex-shrink-0">
                                                <button @click="show = false" type="button"
                                                    class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-600 focus:outline-none">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div x-data="{ show: true }" x-show="show"
                                    class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl bg-white border border-red-100 shadow-2xl ring-1 ring-red-500/10">
                                    <div class="p-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
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
                                                <button @click="show = false" type="button"
                                                    class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-600">
                                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
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
                            <input type="text" name="nama"
                                class="w-full border border-gray-300 rounded-md py-3 px-4 focus:outline-none focus:ring-1 focus:ring-black">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-black mb-2">Alamat Email</label>
                            <input type="email" name="email"
                                class="w-full border border-gray-300 rounded-md py-3 px-4 focus:outline-none focus:ring-1 focus:ring-black">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-black mb-2">Pesan</label>
                            <textarea rows="5" name="pesan"
                                class="w-full border border-gray-300 rounded-md py-3 px-4 focus:outline-none focus:ring-1 focus:ring-black"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-black text-white font-bold py-4 rounded-md hover:bg-gray-800 transition-all tracking-widest uppercase text-sm">
                            Kirim
                        </button>
                    </form>
                </div>

                <div class="hidden lg:flex justify-center">
                    <div class="relative w-[500px] h-[500px] bg-gray-200 rounded-full overflow-hidden">
                        <img src="{{ asset('img/customer-service.png') }}" alt="Customer Service"
                            class="w-full h-full object-cover">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <button onclick="toggleChat()"
        class="fixed bottom-5 right-5 bg-black  text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-all z-[9999]">
        <svg viewBox="0 0 16 16" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M9 0V2H13L16 8.5L13 15H3L0 8.5L3 2H7V0H9ZM4.59794 11.7384L8 12.2618L11.4021 11.7384L11.0979 9.76163L8 10.2382L4.90206 9.76163L4.59794 11.7384ZM7 6.75C7 7.44036 6.44036 8 5.75 8C5.05964 8 4.5 7.44036 4.5 6.75C4.5 6.05964 5.05964 5.5 5.75 5.5C6.44036 5.5 7 6.05964 7 6.75ZM10.25 8C10.9404 8 11.5 7.44036 11.5 6.75C11.5 6.05964 10.9404 5.5 10.25 5.5C9.55964 5.5 9 6.05964 9 6.75C9 7.44036 9.55964 8 10.25 8Z"
                    fill="currentColor"></path>
            </g>
        </svg>
    </button>

    <div id="chatWindow"
        class="fixed hidden bottom-24 min-h-[200px]  right-5 bg-white text-black rounded-lg w-80  flex flex-col  h-72 shadow-xl  shadow-black/20 z-30">
        <div class="bg-black p-4 rounded-t-lg text-white font-bold flex justify-between items-center">
            <span>Camera Assistant</span>
            <button onclick="toggleChat()" class="hover:text-gray-200">✕</button>
        </div>
        <div id="chat-container" class="space-y-4 overflow-y-auto flex-1 p-3">
         <div class="flex items-start gap-2.5 p-3">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 text-black rounded-full flex items-center justify-center">
                        <svg viewBox="0 0 16 16" class="w-5 h-5" fill="currentColor">
                            <path d="M9 0V2H13L16 8.5L13 15H3L0 8.5L3 2H7V0H9ZM4.59794 11.7384L8 12.2618L11.4021 11.7384L11.0979 9.76163L8 10.2382L4.90206 9.76163L4.59794 11.7384ZM7 6.75C7 7.44036 6.44036 8 5.75 8C5.05964 8 4.5 7.44036 4.5 6.75C4.5 6.05964 5.05964 5.5 5.75 5.5C6.44036 5.5 7 6.05964 7 6.75ZM10.25 8C10.9404 8 11.5 7.44036 11.5 6.75C11.5 6.05964 10.9404 5.5 10.25 5.5C9.55964 5.5 9 6.05964 9 6.75C9 7.44036 9.55964 8 10.25 8Z" />
                        </svg>
                    </div>
                    <div class="max-w-[80%] p-3 bg-gray-200 text-gray-900 rounded-tr-xl rounded-br-xl rounded-bl-xl text-sm leading-relaxed">
                 Hai selamat Datang di chatbot asisten Lens.id
                    </div>
                </div>
        </div>

            <div class="p-4 border-t flex  bg-white">
             <input type="text" id="user-input"
    class="flex-1 border rounded-l-lg p-2 text-sm outline-none focus:ring-1 focus:ring-black focus:border-black"
    placeholder="Tanya sesuatu...">
                <button onclick="sendMessage()" class="bg-black text-white px-2 rounded-r-lg">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M11.5003 12H5.41872M5.24634 12.7972L4.24158 15.7986C3.69128 17.4424 3.41613 18.2643 3.61359 18.7704C3.78506 19.21 4.15335 19.5432 4.6078 19.6701C5.13111 19.8161 5.92151 19.4604 7.50231 18.7491L17.6367 14.1886C19.1797 13.4942 19.9512 13.1471 20.1896 12.6648C20.3968 12.2458 20.3968 11.7541 20.1896 11.3351C19.9512 10.8529 19.1797 10.5057 17.6367 9.81135L7.48483 5.24303C5.90879 4.53382 5.12078 4.17921 4.59799 4.32468C4.14397 4.45101 3.77572 4.78336 3.60365 5.22209C3.40551 5.72728 3.67772 6.54741 4.22215 8.18767L5.24829 11.2793C5.34179 11.561 5.38855 11.7019 5.407 11.8459C5.42338 11.9738 5.42321 12.1032 5.40651 12.231C5.38768 12.375 5.34057 12.5157 5.24634 12.7972Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                </button>
            </div>
    </div>

 
<script>
  
    function toggleChat() {
        const chatWindow = document.getElementById('chatWindow');
        chatWindow.classList.toggle('hidden');
    }

    document.getElementById('user-input').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') sendMessage();
    });

    async function sendMessage() {
        const userInput = document.getElementById('user-input');
        const message = userInput.value.trim();
        const container = document.getElementById('chat-container');

        if (!message) return;

        container.innerHTML += `
        <div class="flex items-start flex-row-reverse gap-2.5 p-3">
            <div class="flex-shrink-0 w-8 h-8 bg-black text-white rounded-full flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div class="max-w-[80%] p-3 bg-black text-white rounded-tl-xl rounded-bl-xl rounded-br-xl text-sm text-left">
                ${message}
            </div>
        </div>`;

        userInput.value = '';
        container.scrollTop = container.scrollHeight;

        const loadingId = 'loading-' + Date.now();
        container.innerHTML += `
        <div id="${loadingId}" class="flex items-start gap-2.5 p-3">
            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 text-black rounded-full flex items-center justify-center">
                <svg viewBox="0 0 16 16" class="w-5 h-5" fill="currentColor">
                    <path d="M9 0V2H13L16 8.5L13 15H3L0 8.5L3 2H7V0H9ZM4.59794 11.7384L8 12.2618L11.4021 11.7384L11.0979 9.76163L8 10.2382L4.90206 9.76163L4.59794 11.7384ZM7 6.75C7 7.44036 6.44036 8 5.75 8C5.05964 8 4.5 7.44036 4.5 6.75C4.5 6.05964 5.05964 5.5 5.75 5.5C6.44036 5.5 7 6.05964 7 6.75ZM10.25 8C10.9404 8 11.5 7.44036 11.5 6.75C11.5 6.05964 10.9404 5.5 10.25 5.5C9.55964 5.5 9 6.05964 9 6.75C9 7.44036 9.55964 8 10.25 8Z" />
                </svg>
            </div>
            <div class="max-w-[80%] p-3 bg-gray-200 text-gray-500 rounded-tr-xl rounded-br-xl rounded-bl-xl text-sm italic">
                Mengetik...
            </div>
        </div>`;
        container.scrollTop = container.scrollHeight;

        try {
            const response = await fetch('{{ route('askAi') }}', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();

            const loadingEl = document.getElementById(loadingId);
            if (loadingEl) loadingEl.remove();

            if (data.status === 'success') {
                const chatWindow = document.getElementById('chatWindow');
                if (data.reply.length > 100) {
                    chatWindow.classList.replace('h-72', 'h-96');
                }

                container.innerHTML += `
                <div class="flex items-start gap-2.5 p-3">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 text-black rounded-full flex items-center justify-center">
                        <svg viewBox="0 0 16 16" class="w-5 h-5" fill="currentColor">
                            <path d="M9 0V2H13L16 8.5L13 15H3L0 8.5L3 2H7V0H9ZM4.59794 11.7384L8 12.2618L11.4021 11.7384L11.0979 9.76163L8 10.2382L4.90206 9.76163L4.59794 11.7384ZM7 6.75C7 7.44036 6.44036 8 5.75 8C5.05964 8 4.5 7.44036 4.5 6.75C4.5 6.05964 5.05964 5.5 5.75 5.5C6.44036 5.5 7 6.05964 7 6.75ZM10.25 8C10.9404 8 11.5 7.44036 11.5 6.75C11.5 6.05964 10.9404 5.5 10.25 5.5C9.55964 5.5 9 6.05964 9 6.75C9 7.44036 9.55964 8 10.25 8Z" />
                        </svg>
                    </div>
                    <div class="max-w-[80%] p-3 bg-gray-200 text-gray-900 rounded-tr-xl rounded-br-xl rounded-bl-xl text-sm leading-relaxed whitespace-pre-line">
                        ${data.reply}
                    </div>
                </div>`;
            } else {
                container.innerHTML += `
                <div class="p-3 text-xs text-red-500 italic">Gagal mendapat respons dari AI.</div>`;
            }

        } catch (error) {
            const loadingEl = document.getElementById(loadingId);
            if (loadingEl) loadingEl.remove();
            console.error('Gagal konek:', error);
            container.innerHTML += `
            <div class="p-3 text-xs text-red-500 italic">Koneksi gagal, coba lagi.</div>`;
        }

        container.scrollTop = container.scrollHeight;
    }
</script>

</x-layouts.app>