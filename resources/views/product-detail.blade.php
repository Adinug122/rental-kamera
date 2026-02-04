<x-layouts.app>
    <div class="bg-gray-50/50 min-h-screen pb-20">
        <nav class="max-w-7xl mx-auto px-6  pt-20 text-sm text-gray-500">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="/" class="hover:text-black transition-colors flex items-center gap-1">
                        Home
                    </a>
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </li>
                <li>
                    <a href="#" class="hover:text-black transition-colors">Katalog</a>
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </li>
                <li class="text-black font-semibold line-clamp-1 text-ellipsis">{{ $product->nama_produk }}</li>
            </ol>
        </nav>

        <div class="max-w-7xl mx-auto mt-10 px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 xl:gap-14">
                
                <div class="lg:col-span-7 flex flex-col gap-10">
                    <div class=" rounded-3xl  shadow-sm border border-gray-100">
                        <div class="relative overflow-hidden rounded-2xl bg-gray-200 aspect-[4/3] group">
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 alt="{{ $product->nama_produk }}"
                                 class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
                            
                   
                            @if($product->discount)
                                <div class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                    Hemat {{ number_format((($product->harga - $product->harga_final) / $product->harga) * 100) }}%
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100">
                        <h3 class="text-2xl font-bold mb-6 font-playfair text-gray-900 border-b border-gray-100 pb-4">
                            Deskripsi Produk
                        </h3>
                        <div class="prose prose-gray prose-lg max-w-none text-gray-600 leading-relaxed">
                            <p>
                                {{ $product->deskripsi ?? 'Abadikan setiap momen berharga Anda dengan kualitas profesional. Produk ini dirawat secara berkala untuk memastikan performa terbaik saat digunakan di lapangan.' }}
                            </p>
                        </div>
                    </div>
                </div>
        
              
                <div class="lg:col-span-5">
                    <div class="lg:sticky lg:top-8 space-y-6">
                  
                        <div>
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-3 py-1 bg-gray-900 text-white text-[10px] font-bold uppercase tracking-widest rounded-full">
                                    {{ $product->brands }}
                                </span>
                             
                            </div>

                            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 font-playfair mb-2 leading-tight">
                                {{ $product->nama_produk }}
                            </h1>
                        </div>
        
                        <div class="p-5 bg-white rounded-2xl border border-gray-100 shadow-sm">
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mb-1">Harga Sewa Per Hari</p>
                            <div class="flex items-end gap-3">
                                @if ($product->discount)
                                    <div class="flex flex-col">
                                        <span class="text-4xl font-bold text-gray-900 tracking-tight">
                                            Rp {{ number_format($product->harga_final, 0, ',', '.') }}
                                        </span>
                                        <span class="text-sm text-gray-400 line-through font-medium">
                                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                                        </span>
                                    </div>
                                @else
                                    <span class="text-4xl font-bold text-gray-900 tracking-tight">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </span>
                                @endif
                            </div>
                        </div>
        
                        <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">
                            <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                Yang Kamu Dapat
                            </h3>
                            <div class="grid grid-cols-1 gap-2">
                              
                                @if ($product->benefits !== null)       
                                @foreach($product->benefits as $item)
                                    <div class="flex items-center text-gray-600 text-sm">
                                        <svg class="w-5 h-5 mr-3 text-black flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        {{ $item }}
                                    </div>
                                @endforeach
                                @else
                                    <p class="text-red-500">Benefits kosong</p>
                                @endif
                            </div>
                        </div>
        
                        <div class="bg-white border border-gray-200 rounded-3xl p-6 shadow-xl shadow-gray-200/50 relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900"></div>
                            
                            <h3 class="text-lg font-bold mb-5">Atur Jadwal Sewa</h3>
        
                            <form id="checkForm" action="javascript:void(0);">
                                @csrf
                                <div class="space-y-4">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="col-span-2 md:col-span-1">
                                            <input id="product_id" type="hidden" name="product_id" value="{{ $product->id }}">
                                            <label class="block text-[10px] font-bold uppercase text-gray-500 mb-1.5 ml-1">Mulai Sewa</label>
                                            <div class="relative">
                                                <input id="tanggal_rental" type="date" name="tanggal_rental"
                                                    class="w-full bg-gray-50 border-transparent focus:bg-white border-gray-100 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-black focus:border-transparent transition-all cursor-pointer">
                                            </div>
                                        </div>
                                        <div class="col-span-2 md:col-span-1">
                                            <label class="block text-[10px] font-bold uppercase text-gray-500 mb-1.5 ml-1">Selesai Sewa</label>
                                            <div class="relative">
                                                <input id="tanggal_selesai" type="date" name="tanggal_selesai"
                                                    class="w-full bg-gray-50 border-transparent focus:bg-white border-gray-100 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-black focus:border-transparent transition-all cursor-pointer">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex gap-3 p-3 bg-blue-50/50 border border-blue-100 rounded-xl">
                                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <p class="text-xs text-blue-800 leading-relaxed">
                                            Durasi sewa dihitung per 24 jam. Pengambilan unit di <strong>Lens.id Store Madiun</strong>.
                                        </p>
                                    </div>
            
                                    <button type="submit" id="btnCheck"
                                            class="w-full bg-gray-900 text-white py-4 rounded-xl font-bold text-lg hover:bg-black hover:shadow-lg hover:-translate-y-0.5 transform active:translate-y-0 active:scale-[0.98] transition-all duration-200 flex items-center justify-center gap-2">
                                        <span>Cek Ketersediaan</span>

                                    </button>
                                    
                                    <div id="result" class="hidden text-sm p-4 rounded-lg"></div>
                                    
                                    <button type="button" id="btnBooking" onclick="submitBooking()"
                                            class="w-full bg-gray-900 hidden text-white py-4 rounded-xl font-bold text-lg hover:bg-black hover:shadow-lg hover:-translate-y-0.5 transform active:translate-y-0 active:scale-[0.98] transition-all duration-200 gap-2">
                                        <span>Booking Sekarang</span>
                                       
                                    </button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
<script>
    document.addEventListener('DOMContentLoaded',()=>{
    const form = document.getElementById('checkForm');

    if(form){
 form.addEventListener('submit',(e)=>{
        e.preventDefault();

        const product = document.getElementById('product_id');
        const tanggal_rental = document.getElementById('tanggal_rental');
        const tanggal_selesai = document.getElementById('tanggal_selesai');
        const hasil = document.getElementById('result');
        const buttonCheck = document.getElementById('btnCheck');
        const buttonBooking = document.getElementById('btnBooking');
        const originalBtnText = btnCheck.innerHTML;
        const produkValue = product.value;

        const tanggalMulai = tanggal_rental.value;
        const tanggalSelesai = tanggal_selesai.value;

        if(!tanggal_selesai || !tanggal_rental){
            alert('Harap Diisi Semua tanggal ya')
            return;
        }

        buttonCheck.disabled = true;
        buttonCheck.innerHTML = '<svg class="animate-spin h-5 w-5 mr-3 text-white" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Mengecek...';
        buttonBooking.disabled = true;
        hasil.disabled = true;

        fetch("{{ route('booking.check') }}",{
            method:'POST',
            headers:{
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                product_id: produkValue,
                tanggal_rental: tanggalMulai,
                tanggal_selesai: tanggalSelesai
            })
        })
        .then(response => response.json())
        .then(data=>{
            buttonCheck.disabled = false;
            buttonCheck.innerHTML = originalBtnText;

            hasil.classList.remove('hidden');

            if(data.available){
                hasil.className = "rounded-xl p-4 text-sm bg-green-50 text-green-800 border border-green-200 flex items-center gap-2";
                hasil.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <div>
                        <strong>Unit Tersedia!</strong><br>
                        Masih ada ${data.sisa_kamera} unit di tanggal tersebut.
                    </div>
                `;
                buttonCheck.classList.add('hidden')
                buttonBooking.classList.remove('hidden')
            }else{
                hasil.className = "rounded-xl p-4 text-sm bg-red-50 text-red-800 border border-red-200 flex items-center gap-2";
                hasil.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    <div>
                        <strong>Yah, Stok Habis!</strong><br>
                        Semua unit sedang disewa pada tanggal tersebut. Coba geser tanggal?
                    </div>
                `;
                buttonBooking.classList.add('hidden');
            }
        })
        .catch(error=>{
            console.error('Error:', error);
            btnCheck.disabled = false;
            btnCheck.innerHTML = originalBtnText;
            alert("Terjadi kesalahan sistem atau tanggal tidak valid.");
        })
    });

    }else{
        console.log('form dengan id berikut tidak ada');
    } 
    const submitBooking = ()=>{
        alert("Melanjutkan ke proses pembayaran...");
    }
    })
</script>