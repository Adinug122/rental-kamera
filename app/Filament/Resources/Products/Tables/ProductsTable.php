<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_produk')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->searchable()
                    ->limit(10),
                TextColumn::make('harga')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('benefits')
                    ->badge()
                    ->color('primary'),
                TextColumn::make('brands')
                    ->searchable(),
              ImageColumn::make('image')
                   ->disk('public')
                   ->imageHeight(60) 
                   ->square(),

                TextColumn::make('jumlah_unit')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_new')
                    ->boolean(),
                IconColumn::make('is_sale')
                    ->boolean(),
                TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
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
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
