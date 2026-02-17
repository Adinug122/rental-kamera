 @props(['produk'])
 <section id="produk" class="pt-20 relative">
     
        <div class="max-w-7xl mx-auto">
            <div class="text-center font-playfair text-4xl font-bold text-black">
                <h2>Produk Kami</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mt-10 p-8">
                @foreach ($produk as $item)    
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
                @endforeach
               
            </div>
            <div class="flex justify-center items-center mt-10">
            <a href="{{ route('produk') }}" class="bg-black text-white px-12 py-3 rounded-lg  transition-colors tracking-widest text-sm font-bold group relative">
                <div class="scale-x-0 absolute inset-0 w-full h-full bg-gray-800 transform rounded-lg origin-left transition-transform duration-300 ease-out group-hover:scale-x-100"></div>
               <span class="relative z-10 transition-colors duration-300">
                 CLICK MORE
            </span>
            </a>
        </div>
        </div>
        <div class="absolute inset-x-0 top-100 h-72 bg-[#F0F0F0] hidden md:block shadow-sm z-[-1]"></div> 
    </section>
