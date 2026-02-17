<?php

namespace App\Filament\Widgets;

use App\Models\Rental;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class OmzetChart extends ChartWidget
{
    protected ?string $heading = 'Omzet Chart';

    
    protected function getData(): array
    {
        
            $data = collect(range(6,0))->mapWithKeys(function($days){
                $date = Carbon::now()->subDay($days)->format('Y-m-d');

                $omzet = Rental::whereDate('created_at', $date)
                ->where('status_sewa', 'selesai')
                ->sum('total_harga');

                return [Carbon::now()->subDays($days)->format('D')=> $omzet];
            });
            return [
            'datasets' => [
                [
                    'label' => 'Omzet (Rp)',
                    'data' => $data->values()->toArray(),
                ],
            ],
            'labels' => $data->keys()->toArray(),
        
        
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
