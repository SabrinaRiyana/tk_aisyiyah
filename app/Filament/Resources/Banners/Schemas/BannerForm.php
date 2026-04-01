<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page')
                    ->label('Halaman')
                    ->required(),
                FileUpload::make('image')
                    ->label('Gambar Banner')
                    ->image()
                    ->required(),
            ]);
    }
}
