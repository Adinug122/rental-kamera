<?php

namespace App\Filament\Resources\Testimonis\Schemas;

use Faker\Provider\Image;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;

class TestimoniForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
              TextInput::make('nama_user')
              ->required(),
              Textarea::make('isi_pesan')
              ->required(),
              FileUpload::make('foto')
              ->image()
              ->Directory('testimonis')
              ->disk('public')
              ->visibility('public'),
              Toggle::make('is_active')
              ->required(),
            ]);
    }
}
