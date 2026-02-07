<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 text-center">
    
            {{-- Icon Centang --}}
            <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
    
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                Booking Berhasil!
            </h2>
    
            <p class="text-gray-600 text-sm mb-6">
                Kode Booking: <span class="font-bold text-black">{{ $rental->kode_booking }}</span><br>
                Tim kami akan segera memverifikasi pembayaranmu.
            </p>
    
            {{-- Rincian Booking Dinamis --}}
            <div class="rounded-lg bg-gray-50 p-4 text-left text-sm text-gray-700 mb-6 space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-500">Produk</span>
                    {{-- Ambil nama produk dari item pertama --}}
                    <span class="font-medium">
                        {{ $rental->item->first()->product->nama_produk ?? 'Item Sewaan' }}
                        @if($rental->item->count() > 1)
                            <span class="text-xs text-gray-400">(+{{ $rental->item->count() - 1 }} lainnya)</span>
                        @endif
                    </span>
                </div>
                
                <div class="flex justify-between">
                    <span class="text-gray-500">Tanggal Sewa</span>
                    <span class="font-medium">
                        {{ \Carbon\Carbon::parse($rental->tanggal_rental)->format('d M') }} - 
                        {{ \Carbon\Carbon::parse($rental->tanggal_selesai)->format('d M Y') }}
                    </span>
                </div>

                <div class="flex justify-between border-t border-gray-200 pt-2 mt-2">
                    <span class="text-gray-500">Total Transfer</span>
                    <span class="font-semibold text-gray-900">
                        Rp {{ number_format($rental->total_harga, 0, ',', '.') }}
                    </span>
                </div>
            </div>
    
            <div class="space-y-3">
                <a href="/" class="block w-full rounded-lg bg-black py-3 text-sm font-medium text-white transition hover:bg-gray-800">
                    Kembali ke Beranda
                </a>
    
                {{-- Arahkan ke history atau list produk --}}
                <a href="{{ route('landing') }}" class="block w-full rounded-lg border border-gray-300 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-100">
                    Booking Kamera Lain
                </a>
            </div>
    
        </div>
    </div>
</x-layouts.app>