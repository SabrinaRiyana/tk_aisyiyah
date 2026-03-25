<?php

namespace App\Filament\Resources\Fasilitas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class FasilitasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('foto')
                    ->image()
                    ->directory('fasilitas')
                    ->disk('public')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('judul')
                    ->required()
                    ->maxLength(255),

                Toggle::make('is_tersedia')
                    ->label('Tersedia')
                    ->default(true),

                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull()
                    ->rows(4),
            ]);
    }
}