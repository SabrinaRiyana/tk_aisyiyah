<?php

namespace App\Filament\Resources\Curricula\Schemas;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class CurriculumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Foto Kurikulum')
                    ->image()
                    ->directory('kurikulum')
                    ->required(),
                TextInput::make('title')
                    ->label('Judul Kurikulum')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
