<?php

namespace App\Filament\Resources\Comments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\Filter;
use Illuminate\Cache\RateLimiting\Limit;

class CommentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at','desc')
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('pesan')
                    ->label('Pesan')
                    ->searchable()
                    ->Limit(10),
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
                Filter::make('hari_ini')
                    ->label('hari ini')
                    ->query(fn($query)=>
                        $query->whereDate('created_at',today())
                    ),  
            ])
            ->recordActions([
                  ViewAction::make()
        ->label('Lihat')
        ->modalHeading('Detail Pesan')
        ->modalSubmitAction(false)
        ->modalCancelActionLabel('Tutup')
        ->form([
           TextInput::make('nama')
                ->disabled(),
            TextInput::make('email')
                ->disabled(),
            Textarea::make('pesan')
                ->disabled()
                ->rows(6),
            DateTimePicker::make('created_at')
                ->label('Dikirim pada')
                ->disabled(),
        ]),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
