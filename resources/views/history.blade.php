<x-layouts.app>
    <div class="min-h-screen bg-gray-50 py-8">
        
        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4">
            
            <!-- Desktop Table -->
            <div class="hidden lg:block rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead class="bg-gray-50 text-gray-700">
                            <tr>
                                <th class="py-4 px-4 text-left font-semibold text-sm">Kode Booking</th>
                                <th class="py-4 px-4 text-left font-semibold text-sm">Kamera / Produk</th>
                                <th class="py-4 px-4 text-left font-semibold text-sm">Durasi Sewa</th>
                                <th class="py-4 px-4 text-left font-semibold text-sm">Total Harga</th>
                                <th class="py-4 px-4 text-left font-semibold text-sm">Status</th>
                                <th class="py-4 px-4 text-center font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="text-sm">
                            @forelse($history as $rental)
                                <tr class="hover:bg-gray-50 transition duration-150 border-b border-gray-100 last:border-0">
                                    
                                    <td class="py-4 px-4">
                                        <div class="font-semibold text-gray-900">{{ $rental->kode_booking }}</div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ $rental->created_at->format('d M Y, H:i') }}
                                        </div>
                                    </td>

                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            @if($rental->item->first()->product->image)
                                                <div class="avatar">
                                                    <div class="mask mask-squircle w-10 h-10">
                                                        <img src="{{ asset('storage/' . $rental->item->first()->product->image) }}" alt="Produk" />
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            <div>
                                                <div class="font-semibold text-gray-900">
                                                    {{ $rental->item->first()->product->nama_produk ?? 'Item Terhapus' }}
                                                </div>
                                                @if($rental->item->count() > 1)
                                                    <div class="text-xs text-gray-500 mt-1">
                                                        +{{ $rental->item->count() - 1 }} item lainnya
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td class="py-4 px-4">
                                        <div class="text-xs space-y-1">
                                            <div class="text-gray-700">{{ \Carbon\Carbon::parse($rental->tanggal_rental)->format('d M Y') }}</div>
                                            <div class="text-gray-700">{{ \Carbon\Carbon::parse($rental->tanggal_selesai)->format('d M Y') }}</div>
                                        </div>
                                    </td>

                                    <td class="py-4 px-4">
                                        <div class="font-bold text-gray-900">
                                            Rp {{ number_format($rental->total_harga, 0, ',', '.') }}
                                        </div>
                                    </td>

                                    <td class="py-4 px-4">
                                        @if($rental->status_sewa == 'pending')
                                            <span class="badge badge-warning gap-1 py-2 px-3 text-xs">
                                                Menunggu
                                            </span>
                                        @elseif($rental->status_sewa == 'ongoing')
                                            <span class="badge badge-success gap-1 py-2 px-3 text-xs text-white">
                                                Disewa
                                            </span>
                                        @elseif($rental->status_sewa == 'selesai')
                                            <span class="badge badge-info gap-1 py-2 px-3 text-xs text-white">
                                                Selesai
                                            </span>
                                        @elseif($rental->status_sewa == 'batal')
                                            <span class="badge badge-error gap-1 py-2 px-3 text-xs text-white">
                                                Dibatalkan
                                            </span>
                                        @endif
                                    </td>

                                    <td class="py-4 px-4">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('booking.success', $rental->kode_booking) }}" 
                                               class="btn btn-square btn-sm btn-ghost tooltip" 
                                               data-tip="Lihat Detail">
                                                <span class="icon-[tabler--eye] size-5 text-gray-600"></span>
                                            </a>

                                            @if($rental->status_sewa == 'pending')
                                                <a href="https://wa.me/628123456789?text=Halo admin, saya mau konfirmasi pembayaran untuk booking {{ $rental->kode_booking }}" 
                                                   target="_blank"
                                                   class="btn btn-square btn-sm btn-ghost tooltip"
                                                   data-tip="Konfirmasi WA">
                                                    <span class="icon-[tabler--brand-whatsapp] size-5 text-green-600"></span>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-16 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <span class="icon-[tabler--camera-off] size-12 text-gray-400 mb-3"></span>
                                            <h3 class="text-base font-semibold text-gray-700 mb-1">Belum Ada Riwayat Sewa</h3>
                                            <p class="text-gray-500 text-sm mb-4">Mulai sewa kamera sekarang!</p>
                                            <a href="/produk" class="btn btn-primary btn-sm gap-2">
                                                <span class="icon-[tabler--camera-plus] size-4"></span>
                                                Cari Kamera
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile Cards -->
            <div class="lg:hidden space-y-4">
                @forelse($history as $rental)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <!-- Card Header -->
                        <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="font-bold text-gray-900">{{ $rental->kode_booking }}</div>
                                    <div class="text-xs text-gray-500">{{ $rental->created_at->format('d M Y, H:i') }}</div>
                                </div>
                                @if($rental->status_sewa == 'pending')
                                    <span class="badge badge-warning badge-sm">Menunggu</span>
                                @elseif($rental->status_sewa == 'ongoing')
                                    <span class="badge badge-success badge-sm text-white">Disewa</span>
                                @elseif($rental->status_sewa == 'selesai')
                                    <span class="badge badge-info badge-sm text-white">Selesai</span>
                                @elseif($rental->status_sewa == 'batal')
                                    <span class="badge badge-error badge-sm text-white">Dibatalkan</span>
                                @endif
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-4 space-y-3">
                            <!-- Produk -->
                            <div class="flex items-center gap-3">
                                @if($rental->item->first()->product->image)
                                    <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                            <img src="{{ asset('storage/' . $rental->item->first()->product->image) }}" alt="Produk" />
                                        </div>
                                    </div>
                                @endif
                                <div>
                                    <div class="font-semibold text-gray-900">
                                        {{ $rental->item->first()->product->nama_produk ?? 'Item Terhapus' }}
                                    </div>
                                    @if($rental->item->count() > 1)
                                        <div class="text-xs text-gray-500">+{{ $rental->item->count() - 1 }} item lainnya</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Durasi -->
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-600">Durasi Sewa</span>
                                <div class="text-right">
                                    <div class="text-gray-900">{{ \Carbon\Carbon::parse($rental->tanggal_rental)->format('d M Y') }}</div>
                                    <div class="text-gray-900">{{ \Carbon\Carbon::parse($rental->tanggal_selesai)->format('d M Y') }}</div>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                <span class="text-gray-600 text-sm">Total Harga</span>
                                <span class="font-bold text-lg text-gray-900">Rp {{ number_format($rental->total_harga, 0, ',', '.') }}</span>
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-2 pt-2">
                              
                                @if($rental->status_sewa == 'pending')
                                    <a href="https://wa.me/628123456789?text=Halo admin, saya mau konfirmasi pembayaran untuk booking {{ $rental->kode_booking }}" 
                                       target="_blank"
                                       class="btn btn-sm btn-success flex-1 gap-2 text-green-500">
                                        <span class="icon-[tabler--brand-whatsapp] size-4"></span>
                                        Konfirmasi
                                    </a>
                                @else
                                  <a href="{{ route('booking.success', $rental->kode_booking) }}" 
                                   class="btn btn-sm btn-outline flex-1 gap-2">
                                    <span class="icon-[tabler--eye] size-4"></span>
                                    Detail
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
                        <span class="icon-[tabler--camera-off] size-12 text-gray-400 mb-3"></span>
                        <h3 class="text-base font-semibold text-gray-700 mb-1">Belum Ada Riwayat Sewa</h3>
                        <p class="text-gray-500 text-sm mb-4">Mulai sewa kamera sekarang!</p>
                        <a href="/produk" class="btn btn-primary btn-sm gap-2">
                            <span class="icon-[tabler--camera-plus] size-4"></span>
                            Cari Kamera
                        </a>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-6">
                {{-- {{ $rentals->links() }} --}}
            </div>
        </div>
    </div>
</x-layouts.app>