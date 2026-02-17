<x-layouts.app>
    <div x-data="{
        status:'all',
        match(s){
            if(this.status === 'all') return true
            return this.status === s
        }
    }" class="min-h-screen bg-gray-50 pt-24 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
          
                <div class="hidden lg:block lg:col-span-3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-24">
                    
                        <div class="p-4 border-b border-gray-100 flex items-center gap-3">
                            <div class="avatar placeholder">
                                <div class="bg-neutral text-neutral-content rounded-full w-10">
                                    <span class="text-lg font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="overflow-hidden">
                                <h3 class="font-bold text-gray-900 truncate">{{ Auth::user()->name }}</h3>
                                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                      
                        <nav class="p-2 space-y-1">
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50">
                                <span class="icon-[tabler--user] size-5 text-gray-400"></span>
                                Profil Saya
                            </a>
                            
                            {{-- Menu Aktif (Riwayat) --}}
                            <a href="{{ route('history') }}" class="flex items-center gap-3 px-3 py-2 text-sm font-bold text-primary bg-primary/5 rounded-lg">
                                <span class="icon-[tabler--list-details] size-5"></span>
                                Daftar Transaksi
                            </a>

                
                            <div class="border-t border-gray-100 my-2 pt-2">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50">
                                        <span class="icon-[tabler--logout] size-5"></span>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>

             
                <div class="mt-8 lg:mt-0 lg:col-span-9 space-y-6">
                    
                
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-gray-900">Daftar Transaksi</h1>
                        

                     <div class="hidden sm:flex gap-3">

    <button
        @click="status='all'"
        :class="status==='all' ? 'bg-black text-white' : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100'"
        class="px-4 py-2 rounded-lg text-sm font-medium transition">
        Semua
    </button>

    <button
        @click="status='ongoing'"
        :class="status==='ongoing' ? 'bg-black text-white' : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100'"
        class="px-4 py-2 rounded-lg text-sm font-medium transition">
        Berjalan
    </button>

    <button
        @click="status='selesai'"
        :class="status==='selesai' ? 'bg-black text-white' : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100'"
        class="px-4 py-2 rounded-lg text-sm font-medium transition">
        Selesai
    </button>

</div>

                    </div>

                 
                    <div class="relative">
                        <form action="{{ route('history') }}" method="GET">

                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class=" text-gray-400 size-5">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </span>
                            </span>
                            <input type="text" 
                            name="search" 
           value="{{ request('search') }}"
                                   class="input input-bordered rounded-lg border border-gray-500 w-full pl-10 bg-white" 
                                   placeholder="Cari transaksi sewa kamera...">
                        </form>
                    </div>

                  
                    <div class="space-y-4 h-[65vh] overflow-y-auto pr-2">
                        @forelse($history as $rental)
                            <div    x-show="match('{{ $rental->status_sewa }}')"
    x-cloak
                                class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
                                
                                {{-- Header Kartu: Tanggal & Status --}}
                                <div class="px-5 py-3 border-b border-gray-100 flex flex-wrap items-center justify-between gap-3 bg-gray-50/50">
                                    <div class="flex items-center gap-2 text-sm">
                                        <span class="icon-[tabler--shopping-bag] text-gray-400 size-5"></span>
                                        <span class="font-bold text-gray-700">Sewa</span>
                                        <span class="text-gray-400">•</span>
                                        <span class="text-gray-500">{{ \Carbon\Carbon::parse($rental->created_at)->format('d M Y') }}</span>
                                        <span class="text-gray-400">•</span>
                                        <span class="text-gray-400 font-mono text-xs">{{ $rental->kode_booking }}</span>
                                    </div>
                                    
                                    
                                    <div>
                                        @if($rental->status_sewa == 'pending')
                                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-md text-xs font-bold bg-yellow-100 text-yellow-700">
                                                Menunggu Konfirmasi
                                            </span>
                                        @elseif($rental->status_sewa == 'ongoing')
                                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-md text-xs font-bold bg-green-100 text-green-700">
                                                Sedang Disewa
                                            </span>
                                        @elseif($rental->status_sewa == 'selesai')
                                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-md text-xs font-bold bg-blue-100 text-blue-700">
                                                Selesai
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-md text-xs font-bold bg-red-100 text-red-700">
                                                Dibatalkan
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Body Kartu: Info Produk --}}
                                <div class="p-5 flex flex-col sm:flex-row gap-4 items-start">
                                    {{-- Gambar Produk --}}
                                    <div class="shrink-0">
                                        @if($rental->item->first() && $rental->item->first()->product->image)
                                            <img src="{{ asset('storage/' . $rental->item->first()->product->image) }}" 
                                                 alt="Produk" 
                                                 class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg border border-gray-200">
                                        @else
                                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                                                <span class="icon-[tabler--photo-off] text-gray-400 size-6"></span>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Detail Produk --}}
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mb-1 truncate">
                                            {{ $rental->item->first()->product->nama_produk ?? 'Produk Tidak Tersedia' }}
                                        </h3>
                                        <p class="text-xs text-gray-500 mb-2">
                                            {{ $rental->item->count() }} Barang x Durasi {{ \Carbon\Carbon::parse($rental->tanggal_rental)->diffInDays(\Carbon\Carbon::parse($rental->tanggal_selesai)) }} Hari
                                            <span class="text-gray-300 mx-1">|</span>
                                            {{ \Carbon\Carbon::parse($rental->tanggal_rental)->format('d M') }} - {{ \Carbon\Carbon::parse($rental->tanggal_selesai)->format('d M') }}
                                        </p>
                                        
                                        @if($rental->item->count() > 1)
                                            <div class="text-xs text-blue-600 bg-blue-50 w-fit px-2 py-1 rounded">
                                                +{{ $rental->item->count() - 1 }} produk lainnya
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Total Harga (Posisi Kanan di Desktop) --}}
                                    <div class="sm:text-right pt-2 sm:pt-0 sm:border-l sm:border-gray-100 sm:pl-4 min-w-[120px]">
                                        <p class="text-xs text-gray-500 mb-1">Total Belanja</p>
                                        <p class="font-bold text-gray-900 text-base">
                                            Rp {{ number_format($rental->total_harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>

                                {{-- Footer Kartu: Tombol Aksi --}}
                                <div class="px-5 py-3 border-t border-gray-100 flex flex-wrap justify-end gap-3 items-center">
                                    <a href="{{ route('booking.success', $rental->kode_booking) }}" 
                                       class="text-sm font-bold text-green-600 hover:text-green-700 mr-auto">
                                        Lihat Detail Transaksi
                                    </a>

                                    @if($rental->status_sewa == 'pending')
                                        <a href="https://wa.me/628123456789?text=Halo admin, saya mau konfirmasi pembayaran..." 
                                           target="_blank" 
                                           class="bg-black/90 hover:bg-black text-white px-4 py-2 rounded-lg w-full sm:w-auto">
                                           Chat Admin
                                        </a>
                                    @elseif($rental->status_sewa == 'selesai')
                                        <a href="/produk" class="bg-black/90 hover:bg-black text-white px-4 py-2 rounded-lg w-full sm:w-auto">
                                            Sewa Lagi
                                        </a>
                                   
                                    @endif
                                </div>

                            </div>
                        @empty
                            {{-- State Kosong --}}
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="icon-[tabler--shopping-cart-off] size-10 text-gray-300"></span>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Belum ada transaksi</h3>
                                <p class="text-gray-500 text-sm mb-6">Kamu belum pernah menyewa kamera apapun. Yuk mulai sewa!</p>
                                <a href="/produk" class="btn btn-primary px-8">Mulai Sewa</a>
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-8">
                        {{ $history->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>