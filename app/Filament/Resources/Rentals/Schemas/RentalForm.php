<?php

namespace App\Filament\Resources\Rentals\Schemas;

use App\Models\Product;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Ramsey\Collection\Set;

class RentalForm
{
    public static function make(Schema $schema): Schema
    {
        return $schema->schema([
Section::make('Informasi Sewa')->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Penyewa')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('kode_booking')
                    ->default(fn () => 'BK-' . strtoupper(Str::random(6)))
                    ->disabled()
                    ->dehydrated()
                    ->required(),

                Select::make('status_sewa')
                    ->options([
                        'pending' => 'Pending',
                        'ongoing' => 'Ongoing',
                        'selesai' => 'Selesai',
                        'batal' => 'Batal',
                    ])
                    ->default('ongoing')
                    ->required(),
            ])->columns(2),

          
            Section::make('Barang Sewaan')->schema([
                Repeater::make('item')
                    ->relationship()
                    ->live()
                    ->afterStateUpdated(function($get,$set){
                        $items = $get('item');
                        $total = 0;
                        foreach($items as $item){
                            $total += (float) ($item['subtotal']?? 0);
                        }
                        $set('total_harga',$total);
                    })
                    ->schema([
                        Select::make('product_id')
                            ->relationship('product', 'nama_produk')
                            ->label('Produk')
                            ->required()        
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function ($state, $set,$get) {
                                $product = Product::find($state);
                                $qty = (float) ($get('qty') ?:1);
                                $harga = $product ? $product->harga_final : 0;
                                $subtotal = $harga * $qty;
                                $set('subtotal',$subtotal);
                                $items = $get('../../item') ?? [];
                                $total = 0;
                                foreach($items as $item){
                                    $total += (float) ($item['subtotal']?? 0);
                                }
                                $set('../../total_harga',$total);
                            }),

                        TextInput::make('qty')
                            ->numeric()
                            ->default(1)
                            ->reactive()
                            ->afterStateUpdated(function ($state, $set, $get) {
                             $product = Product::find($state);
                                $qty = (float) ($get('qty') ?:1);
                                $harga = $product ? $product->harga_final : 0;
                                $subtotal = $harga * $qty;
                                $set('subtotal',$subtotal);
                                $items = $get('../../item') ?? [];
                                $total = 0;
                                foreach($items as $item){
                                    $total += (float) ($item['subtotal']?? 0);
                                }
                                $set('../../total_harga',$total);
                            }),

                        TextInput::make('subtotal')
                            ->numeric()
                            ->readOnly()
                            ->prefix('Rp')
                            ->live(),
                    ])->columns(3)
            ]),

            Section::make('Detail Pembayaran')->schema([
                DatePicker::make('tanggal_rental')->required(),
                DatePicker::make('tanggal_selesai')->required(),
                
                TextInput::make('total_harga')
                    ->numeric()
                    ->readOnly()
                    ->prefix('Rp')
                    ->default(0)
                    ->required(),

                FileUpload::make('bukti_pembayaran')
                    ->disk('public')
                    ->directory('payments')
                    ->image()
                    ->visibility('public'),

                FileUpload::make('jaminan')
                    ->disk('public')
                    ->directory('jaminan')
                    ->image()
                    ->visibility('public'),
            ])->columns(2),
        ]);
    }
}
