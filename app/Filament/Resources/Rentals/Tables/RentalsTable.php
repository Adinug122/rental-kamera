<?php

namespace App\Filament\Resources\Rentals\Tables;

use App\Models\Rental;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use pxlrbt\FilamentExcel\Columns\Column;
use PHPUnit\Framework\TestStatus\Notice;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class RentalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Penyewa')
                    ->numeric()
                    
                    ->sortable(),
                TextColumn::make('user.phone')
                    ->label('No HP')
                    ->copyable()
                    ->sortable(),
                TextColumn::make('item.product.nama_produk')
                    ->label('Produk')
                    ->sortable(),
                TextColumn::make('kode_booking')
                    ->searchable(),
                TextColumn::make('tanggal_rental')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_selesai')
                    ->date()
                    ->sortable(),
                TextColumn::make('status_sewa')
                    ->badge()
                    ->color(fn(string $state):string => match($state){
                    'pending' => 'warning',  
                    'ongoing' => 'success',   
                    'cancelled' => 'danger',  
                    'completed' => 'info',   
                    default => 'gray',
                    }),
                TextColumn::make('total_harga')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                
                TextColumn::make('biaya_denda_per_hari')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                
                TextColumn::make('denda')
                    ->numeric()
                    ->money('IDR')
                    ->sortable(),
                ImageColumn::make('bukti_pembayaran')
                    ->disk('public')
                    ->square()
                    ->height(80),
                ImageColumn::make('jaminan')
                    ->disk('public')
                    ->square()
                    ->height(80),
                
            
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
             ->filters([
            SelectFilter::make('tanggal_rental')
            ->label('Bulan Rental')
            ->options([
                '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                    '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                    '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                    '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
            ])
            ->query(fn($query,$data)=>
                $query->when($data['value'],fn($q) => $q->whereMonth('tanggal_rental',$data['value']))
            ),
        ])
->headerActions([
  ExportAction::make()
    ->label('Export Laporan')
    ->icon('heroicon-o-arrow-down-tray')
    ->color('success')
    ->exports([
        ExcelExport::make()
            ->withFilename('Laporan Bulan-'.now()->format('m-Y'))
            ->modifyQueryUsing(fn($query)=> $query->with(['user','item.product']))
            ->withColumns([
                Column::make('kode_booking')->heading('Kode Booking'),

                Column::make('user.name')
                    ->heading('Nama Penyewa')
                    ->formatStateUsing(fn ($state, $record) => $record->user?->name ?? '-'),

                Column::make('user.phone')
                    ->heading('No HP')
                    ->formatStateUsing(fn ($state,$record) => $record->user?->phone ?? '-'),
                Column::make('item')
    ->heading('Nama Produk')
    ->formatStateUsing(function ($state) {
        if (!$state) return '-';

        return collect($state)
            ->map(fn ($item) => $item->product?->nama_produk)
            ->filter()
            ->join(', ');
    }),

                Column::make('total_harga')->heading('Total Sewa'),
                Column::make('denda')->heading('Denda'),
                Column::make('status_sewa')->heading('Status'),
            ]),
    ])

])
                ->recordActions([
                       ActionGroup::make([
                    Action::make('Terima')
                    ->label(    'Terima')
                    ->icon('heroicon-o-check-circle') 
                    ->color('success') // Hijau
                    ->visible(fn (Rental $record) => $record->status_sewa === 'pending') // Hide kalau udah diapprove
                    ->requiresConfirmation()
                    ->modalHeading('Terima Pembayaran?')
                    ->modalDescription('Pastikan bukti transfer valid.')
                    ->action(function (Rental $record) {
                        $record->update(['status_sewa' => 'ongoing']);  
                        Notification::make()
                            ->title('Booking Disetujui')
                            ->success()
                            ->send();
                    }),         
                    Action::make('Tolak')
                    ->label('tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn(Rental $record) => $record->status_sewa === 'pending')
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Pembayaran')
                    ->modalDescription('Pastikan bukti transfer tidak valid')
                     ->action(function (Rental $record) {
                        $record->update(['status_sewa' => 'batal']);  
                        Notification::make()
                            ->title('Booking Ditolak')
                            ->danger()
                            ->send();
                    }),   
                  Action::make('Selesai')
                    ->label('Selesai')
                    ->icon('heroicon-o-check-circle')     
                    ->color('success')
                    ->visible(fn(Rental $record) => $record->status_sewa === 'ongoing')
                    ->requiresConfirmation()
                    ->modalHeading('Tandai rental Selesai?')
                    ->modalDescription('Pastikan kamera masih dalam keadaan baik')
                    ->action(function(Rental $record){
                        $record->refresh();
                        
                        $tglSelesai = Carbon::parse($record->tanggal_selesai)->startOfDay();
                        $tglSekarang = now()->startOfDay();
                        
                        $totalDenda = 0;
                        
                    
                        if($tglSekarang->gt($tglSelesai)){
                            $selisihHari = $tglSelesai->diffInDays($tglSekarang);
                            
                            $tarifPerHari = $record->biaya_denda_per_hari > 0 ? $record->biaya_denda_per_hari : 20000;
                            $totalDenda = $selisihHari * $tarifPerHari;
                        }

        $record->update([
            'status_sewa' => 'selesai',
            'denda' => $totalDenda,
            'total_harga' => $record->total_harga + $totalDenda, 
        ]);
        
        Notification::make()
            ->title($totalDenda > 0 ? "Selesai. Denda: Rp " . number_format($totalDenda) : "Selesai Tepat Waktu")
            ->success()
            ->send();
    }),

                Action::make('lihat-dokumen')
    ->label('Lihat Dokumen')
    ->icon('heroicon-o-document-magnifying-glass')
    ->color('info')
    ->modalHeading('Verifikasi Pembayaran & Jaminan')
    ->modalWidth('4xl')
    ->modalSubmitAction(false)
->modalContent(fn($record) => new HtmlString('
    <div style="padding:8px 0 16px;">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:12px;">
            
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2 px-3 py-2 bg-blue-50 border border-blue-200 rounded-lg">
                    <span class="text-sm font-semibold text-blue-700">Bukti Transfer</span>
                </div>
                <div class="relative group w-full bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden" style="min-height:200px; display:flex; align-items:center; justify-content:center;">
                    <img src="' . asset('storage/' . $record->bukti_pembayaran) . '" 
                         class="object-contain cursor-pointer transition-transform duration-200 group-hover:scale-105" 
                         style="max-height:45vh; width:100%;" 
                         onclick="window.open(this.src, \'_blank\')" />
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2 px-3 py-2 bg-green-50 border border-green-200 rounded-lg">
                    <span class="text-sm font-semibold text-green-700">Foto Jaminan (KTP/Lainnya)</span>
                </div>
                <div class="relative group w-full bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden" style="min-height:200px; display:flex; align-items:center; justify-content:center;">
                    <img src="' . asset('storage/' . $record->jaminan) . '" 
                         class="object-contain cursor-pointer transition-transform duration-200 group-hover:scale-105" 
                         style="max-height:45vh; width:100%;" 
                         onclick="window.open(this.src, \'_blank\')" />
                </div>
            </div>
        </div>

        <div class="flex items-center gap-1">
             <span class="text-xs font-medium text-red-500 italic">* Klik gambar untuk memperbesar di tab baru</span>
        </div>
    </div>
')),
                    
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
