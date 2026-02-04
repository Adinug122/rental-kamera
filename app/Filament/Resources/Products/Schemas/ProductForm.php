<?php

namespace App\Filament\Resources\Products\Schemas;

use Directory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_produk')
                    ->required(),
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('brands'),
               Repeater::make('benefits')
                    ->label('Kelengkapan / Benefit Sewa')
                    ->simple(
                        TextInput::make('item') // Beri nama dummy 'item'
                            ->placeholder('Contoh: Charger')
                            ->required()
                    )
                    ->addActionLabel('Tambah Benefit')
                    ->columnSpanFull(),
                    
                FileUpload::make('image')
                    ->image()
                    ->Directory('products')
                    ->disk('public')
                    ->visibility('public'),
                TextInput::make('jumlah_unit')
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('is_new')
                    ->required(),
                Toggle::make('is_sale')
                    ->required(),
                TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
