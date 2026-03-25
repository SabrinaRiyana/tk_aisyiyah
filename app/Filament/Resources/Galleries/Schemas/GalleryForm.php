<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
{
    return $schema->components([
        TextInput::make('judul')
            ->required(),

        Textarea::make('deskripsi'),

        FileUpload::make('foto')
            ->image()
            ->disk('public') // 🔥 WAJIB
            ->directory('galeri')
            ->visibility('public') // 🔥 WAJIB
            ->required(),
    ]);
}
}
