<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;;
use Filament\Actions\DeleteAction;;
use Filament\Actions\DeleteBulkAction;


class GalleriesTable
{
    public static function configure(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('foto')
                ->disk('public')
                ->circular()
                ->visibility('public'),

            TextColumn::make('judul')
                ->searchable(),

            TextColumn::make('deskripsi')
                ->label('Deskripsi') // Nama kolom yang bakal muncul di web
                ->limit(50),

            TextColumn::make('created_at')
                ->label('Tanggal Dibuat')
                ->date(),
        ])
        ->actions([
            EditAction::make()
                ->label('Edit'),
            DeleteAction::make()
                ->label('Hapus'),
        ])
        ->bulkActions([
            DeleteBulkAction::make()
                ->label('Hapus'),
        ]);
    }
}
