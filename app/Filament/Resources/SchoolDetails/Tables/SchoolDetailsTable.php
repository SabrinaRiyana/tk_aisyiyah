<?php

namespace App\Filament\Resources\SchoolDetails\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class SchoolDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->disk('public')
                    ->circular()
                    ->height(80),
                TextColumn::make('history_text')->label('Sejarah/Deskripsi')->limit(300),
                TextColumn::make('reason_title')->label('Judul Alasan'),
                TextColumn::make('reasons')
                    ->label('Alasan')
                    ->formatStateUsing(fn ($state) => collect($state)->pluck('item')->join(', '))
                    ->limit(225),
                TextColumn::make('updated_at')->dateTime()->label('Terakhir Update'),
            ])

            ->actions([
                EditAction::make()
                    ->label('Edit'),
                DeleteAction::make()
                    ->label('Hapus'),
            ]);
    }
}