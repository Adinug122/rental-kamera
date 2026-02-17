<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Rental;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RentalStats extends StatsOverviewWidget
{protected function getStats(): array
{
    $today = now()->toDateString();

    $omzetHariIni = Rental::where('status_sewa','selesai')
        ->whereDate('tanggal_selesai',$today)
        ->sum('total_harga');

    $perluAcc = Rental::where('status_sewa','pending')->count();

    $telat = Rental::where('status_sewa','ongoing')
        ->whereDate('tanggal_selesai','<',$today)
        ->count();

    $dipinjam = Rental::where('status_sewa','ongoing')->count();

    $totalProduk = Product::count();
    $tersedia = max($totalProduk - $dipinjam, 0);

    return [

        Stat::make('Omzet Hari Ini', 'Rp '.number_format($omzetHariIni,0,',','.'))
            ->description('Transaksi selesai hari ini')
            ->descriptionIcon('heroicon-o-banknotes')
            ->color('success'),

        Stat::make('Perlu ACC', $perluAcc)
            ->description('Booking belum diverifikasi')
            ->descriptionIcon('heroicon-o-clock')
            ->color('warning'),

        Stat::make('Telat Dikembalikan', $telat)
            ->description('Harus segera ditagih')
            ->descriptionIcon('heroicon-o-exclamation-triangle')
            ->color('danger'),

        Stat::make('Unit Tersedia', $tersedia.' / '.$totalProduk)
            ->description('Kamera siap disewa')
            ->descriptionIcon('heroicon-o-camera')
            ->color('primary'),
    ];
}

}
