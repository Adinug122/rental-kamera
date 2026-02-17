<?php

namespace App\Filament\Resources\Rentals\Pages;

use App\Filament\Resources\Rentals\RentalResource;
use App\Models\Rental;
use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListRentals extends ListRecords
{
    protected static string $resource = RentalResource::class;

    protected function getHeaderActions(): array
    {
        return [
           
         Action::make('setupDenda')
    ->label('Update Denda Ongoing')
    ->icon('heroicon-m-adjustments-horizontal')
    ->color('warning') 
    ->requiresConfirmation()
    ->form([
        TextInput::make('biaya_baru')
            ->label('Tarif Denda Baru (Untuk Semua yang Masih Sewa)')
            ->numeric()
            ->prefix('Rp')
            ->required(),
    ])
    ->action(function (array $data) {
        
        \App\Models\Rental::where('status_sewa', 'ongoing')
            ->update(['biaya_denda_per_hari' => $data['biaya_baru']]);

        Notification::make()
            ->title('Semua denda ongoing berhasil diupdate!')
            ->success()
            ->send();
    }),
            CreateAction::make(),
        ];
    }
}
