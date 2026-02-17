<x-layouts.app>
    <div class="bg-gray-50 min-h-screen pt-24 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="flex flex-col lg:flex-row gap-8">
                
                <aside class="w-full lg:w-64 space-y-6">
                    <form action="{{ route('produk') }}" method="GET" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <span class="icon-[tabler--filter] size-5 text-primary"></span> Filter
                        </h3>

                        <div class="mb-6">
                            <label class="text-xs font-bold uppercase text-gray-400 mb-2 block">Cari Nama</label>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   class="input input-bordered input-sm w-full" placeholder="Contoh: Sony...">
                        </div>

                        <div class="mb-6">
                            <label class="text-xs font-bold uppercase text-gray-400 mb-2 block">Harga Maksimal</label>
                            <input type="number" name="max_price" value="{{ request('max_price') }}" 
                                   class="input input-bordered input-sm w-full" placeholder="Rp 500.000">
                        </div>

                        <button type="submit" class="bg-black px-3 py-2 mb-3 rounded-lg text-white btn-sm w-full">Terapkan Filter</button>
                        <a href="{{ route('produk') }}" class="bg-black px-3 py-2 rounded-lg w-full mt-2 text-white">Reset</a>
                    </form>
                </aside>

                <main class="flex-1">
                    
                    <div class="flex justify-between items-center mb-6 bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                        <p class="text-sm text-gray-500">
                            Menampilkan <span class="font-bold text-gray-900">{{ $products->total() }}</span> Produk
                        </p>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-gray-400">Urutkan:</span>
                            <select name="sort" class="select select-bordered select-xs" onchange="window.location.href = this.value">
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_low']) }}" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Termurah</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        @forelse($products as $item)
                              <div
                    class="block group relative rounded-xl overflow-hidden bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] transition-all hover:-translate-y-1">

                    @if ($item->is_new)
                    <div
                        class="absolute {{ $item->is_sale ? 'top-4' : 'top-4' }} left-4 z-10
                        bg-[#0DB07B] shadow-[0_4px_15px_rgba(13,176,123,0.5)]
                        rounded-md text-xs font-bold text-white py-1 px-3 tracking-wider">
                        NEW
                    </div>
                @endif

                   @if ($item->is_sale)
                    <div
                        class="absolute {{ $item->is_new ? 'top-12' : 'top-4' }} left-4 z-10
                        bg-[#F96552] shadow-[0_4px_15px_#F96552]
                        rounded-md text-xs font-bold text-white py-1 px-3 tracking-wider">
                        SALE
                    </div>
                @endif


                    <div class="bg-[#EAEAEA] h-64 w-full flex items-center justify-center p-8">
                        <img alt="kamera" src="{{ asset('storage/' . $item->image) }}"
                            class="h-full w-auto object-contain drop-shadow-[0_15px_25px_rgba(0,0,0,0.25)] transition-transform group-hover:scale-105">
                    </div>

                    <div class="bg-white p-5 rounded-b-xl border-t border-gray-50">
                        <div class="mb-1">
                            <span class="text-xs font-medium text-gray-400 uppercase tracking-wider">CAMERA |
                                CAMERA</span>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900 text-lg leading-tight">{{ $item->nama_produk }}</h3>
                        </div>
                        <div class="mt-3">
                            @if ($item->discount)
                                 <p class="text-gray-900 font-medium text-sm">
                                    <span class="text-slate-500 line-through">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }} 
                                    </span>

                         Rp {{ number_format($item->harga_final, 0, ',', '.') }}
                              @if (! $item->is_sale)
                                <span class="text-gray-500 font-normal text-sm">/ day</span>
                            @endif
                                <span class="ml-1 text-xs px-2 py-1 bg-red-100 text-red-600 rounded">
                {{ $item->discount }}%
            </span>
                            </p>
                            @else
                                <p class="text-gray-900 font-medium text-base">
                                    Rp {{ number_format($item->harga,0,',','.') }}
                                </p>
                            @endif
                           
                        </div>
                            <div class="mt-4">
                           <a href="{{ route('produk.show',$item->id) }}" class="relative text-sm font-medium text-gray-700 group">
    Lihat Detail
    <span class="absolute left-0 -bottom-1 w-0 h-[1px] bg-black transition-all duration-300 group-hover:w-full"></span>
</a>

                        </div>
                    </div>


                </div>
                        @empty
                            <div class="col-span-full py-20 text-center">
                                <span class="icon-[tabler--camera-off] size-12 text-gray-300 mb-2"></span>
                                <p class="text-gray-500">Kamera tidak ditemukan.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-12 flex justify-center">
                        {{ $products->links() }}
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-layouts.app>