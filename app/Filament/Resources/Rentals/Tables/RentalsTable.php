<?php

namespace App\Filament\Resources\Rentals\Tables;

use App\Models\Rental;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use PHPUnit\Framework\TestStatus\Notice;

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
                ImageColumn::make('bukti_pembayaran')
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
                //
            ])
         
                ->recordActions([
                       ActionGroup::make([
                    Action::make('Terima')
                    ->label('Terima')
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
                        $record->update(['status_sewa' => 'selesai']);
                       Notification::make()
                            ->title('Rental Selesai')
                            ->success()
                            ->send();
                    }),
                    Action::make('lihat-bukti')
                    ->label('Lihat Bukti')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Bukti Pembayaran')
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false)
                    ->modalWidth('xl')
                 ->modalContent(fn($record) => new HtmlString('
        <div class="flex w-full justify-center items-center bg-gray-50 p-4 rounded-lg">
            <img 
                src="'. asset('storage/' . $record->bukti_pembayaran) .'" 
                class="max-w-full max-h-[70vh] object-contain rounded-lg shadow-md"
                alt="Bukti Transfer"
            >
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
