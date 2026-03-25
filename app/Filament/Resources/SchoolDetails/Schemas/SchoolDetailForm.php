<?php

namespace App\Filament\Resources\SchoolDetails\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SchoolDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Sejarah Sekolah')
                ->description('Deskripsi')
                ->schema([
                    FileUpload::make('image_path') 
                        ->image()
                        ->label('Foto Utama')
                        ->directory('about'),
                    RichEditor::make('history')
                        ->label('Teks Sejarah/Deskripsi')
                        ->required(),
                ]),
            
            Section::make('Keunggulan')
                ->description('alasan')
                ->schema([
                    TextInput::make('reason_title')
                        ->label('Judul Section')
                        ->default('KENAPA HARUS TK AISYIYAH??'),
                    Repeater::make('reasons') 
                        ->label('Daftar Alasan')
                        ->default([])
                        ->schema([
                            TextInput::make('point')->required(),
                        ])
                        ->createItemButtonLabel('Tambah Poin'),
                ]),
        ]);
    }
}