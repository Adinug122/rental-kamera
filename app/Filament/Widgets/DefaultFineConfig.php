<?php

namespace App\Filament\Widgets;

use App\Models\Setting; // Pastikan kamu buat model/tabel ini nanti
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class DefaultFineConfig extends StatsOverviewWidget
{
    protected function getStats(): array
    {

        $currentFine = 20000; 

        return [
            Stat::make('Denda Default Sistem', 'Rp ' . number_format($currentFine, 0, ',', '.'))
                ->description('Klik ikon di kanan untuk ubah harga')
                ->descriptionIcon('heroicon-m-pencil-square')
                ->color('warning')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                   
                ]),
        ];
    }
}