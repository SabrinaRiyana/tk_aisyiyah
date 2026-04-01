<?php

namespace App\Filament\Resources\Fasilitas\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;;
use Filament\Actions\DeleteAction;;
use Filament\Actions\DeleteBulkAction;

class FasilitasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->circular()
                    ->disk('public'), 

                TextColumn::make('judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('deskripsi')
                ->label('Deskripsi') // Nama kolom yang bakal muncul di web
                ->limit(100),

                IconColumn::make('is_tersedia')
                    ->label('Status')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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