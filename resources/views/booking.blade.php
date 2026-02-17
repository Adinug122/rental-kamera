<x-layouts.app>
    <div class="bg-gray-50 min-h-screen pt-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 font-playfair">Konfirmasi Pesanan</h1>
                <p class="text-gray-500 text-sm mt-1">Periksa kembali detail sewa Anda sebelum melanjutkan.</p>
            </div>

            <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="tanggal_rental" value="{{ $tanggal_rental }}">
                <input type="hidden" name="tanggal_selesai" value="{{ $tanggal_selesai }}">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    
            
                    <div class="lg:col-span-7 space-y-6">
                        
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                            <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Data Penyewa
                            </h2>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Nama Lengkap</label>
                                    <input type="text" value="{{ Auth::user()->name }}" readonly 
                                           class="w-full bg-gray-50 border-gray-200 rounded-xl px-4 py-3 text-gray-600 cursor-not-allowed focus:ring-0">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Email</label>
                                    <input type="text" value="{{ Auth::user()->email }}" readonly 
                                           class="w-full bg-gray-50 border-gray-200 rounded-xl px-4 py-3 text-gray-600 cursor-not-allowed focus:ring-0">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase text-gray-500 mb-1">No HP</label>
                                    <input type="text" value="{{ Auth::user()->phone }}" readonly 
                                           class="w-full bg-gray-50 border-gray-200 rounded-xl px-4 py-3 text-gray-600 cursor-not-allowed focus:ring-0">
                                </div>
                            </div>
                        </div>
                 

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mt-6">
    <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
        Pembayaran
    </h2>
    
    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-4">
        <p class="text-xs text-blue-600 mb-1">Silakan transfer total tagihan ke:</p>
        <div class="flex items-center gap-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" class="h-4 w-auto" alt="BCA">
            <div>
                <p class="font-bold text-gray-900 text-lg">123-456-7890</p>
                <p class="text-xs text-gray-500">a.n. Lens.id Official</p>
            </div>
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Upload Bukti Transfer</label>
        <input type="file" name="bukti_pembayaran" accept="image/*" required
               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-900 file:text-white hover:file:bg-black cursor-pointer border border-gray-200 rounded-xl">
        <p class="text-[10px] text-gray-400 mt-1">*Format: JPG, PNG. Maks 2MB.</p>
        @error('bukti_pembayaran') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div>
     <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Upload Bukti jaminan</label>
     <input type="file" name="jaminan" required accept="image/*"
        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-900 file:text-white hover:file:bg-black cursor-pointer border border-gray-200 rounded-xl">
        <p class="text-[10px] text-gray-400 mt-1">*Format: JPG, PNG. Maks 2MB.</p>
@error('jaminan')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
@enderror
</div>
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                            <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Detail Waktu Sewa
                            </h2>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 bg-gray-50 rounded-xl border border-gray-200">
                                    <span class="text-xs text-gray-500 block mb-1">Tanggal Mulai</span>
                                    <span class="font-bold text-gray-900">{{ \Carbon\Carbon::parse($tanggal_rental)->format('d M Y') }}</span>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-xl border border-gray-200">
                                    <span class="text-xs text-gray-500 block mb-1">Tanggal Selesai</span>
                                    <span class="font-bold text-gray-900">{{ \Carbon\Carbon::parse($tanggal_selesai)->format('d M Y') }}</span>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Jumlah Unit (Qty)</label>
                                <div class="relative w-full md:w-1/3">
                                    <input type="number" name="qty" value="1" min="1" max="{{ $product->jumlah_unit }}" required
                                           class="w-full border-gray-300 rounded-xl px-4 py-3 focus:ring-black focus:border-black font-bold text-center"
                                           oninput="updateTotal(this.value)">
                                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400 text-sm">Unit</div>
                                </div>
                                @error('qty') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                    </div>

                
                    <div class="lg:col-span-5">
                        <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-100 sticky top-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-6">Ringkasan Pesanan</h3>

                            <div class="flex gap-4 mb-6 pb-6 border-b border-gray-100">
                                <img src="{{ asset('storage/'.$product->image) }}" class="w-20 h-20 object-cover rounded-xl bg-gray-100 border border-gray-200">
                                <div>
                                    <h4 class="font-bold text-gray-900 line-clamp-2">{{ $product->nama_produk }}</h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $product->brands }}</p>
                                </div>
                            </div>

                            <div class="space-y-3 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-100">
                                <div class="flex justify-between">
                                    <span>Harga Sewa / Hari</span>
                                    <span>Rp {{ number_format($product->harga_final, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Durasi Sewa</span>
                                    <span>{{ $days }} Hari</span>
                                </div>
                                <div class="flex justify-between items-center font-medium text-black">
                                    <span>Jumlah Unit</span>
                                    <span id="qty_display">1 Unit</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-end mb-8">
                                <span class="text-gray-500 font-bold">Total Pembayaran</span>
                                <span class="text-3xl font-bold text-gray-900" id="total_price">
                                    Rp {{ number_format($product->harga_final * $days, 0, ',', '.') }}
                                </span>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-gray-900 text-white py-4 rounded-xl font-bold text-lg hover:bg-black hover:shadow-lg transition-all transform active:scale-[0.98]">
                                Bayar & Booking
                            </button>
                            
                            <p class="text-center text-xs text-gray-400 mt-4">
                                Dengan menekan tombol, Anda menyetujui syarat & ketentuan sewa.
                            </p>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>


    <script>
        const hargaPerHari = {{ $product->harga }};
        const durasi = {{ $days }};
        
        function updateTotal(qty) {
            if(qty < 1) qty = 1;
            
          
            document.getElementById('qty_display').innerText = qty + " Unit";
            
          
            let total = hargaPerHari * durasi * qty;
            
            // Format Rupiah
            let formatted = new Intl.NumberFormat('id-ID', { 
                style: 'currency', 
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(total);

            document.getElementById('total_price').innerText = formatted;
        }
    </script>
</x-layouts.app>