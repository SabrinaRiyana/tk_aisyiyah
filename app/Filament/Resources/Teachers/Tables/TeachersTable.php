<?php

namespace App\Filament\Resources\Teachers\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;

class TeachersTable
{
    public static function configure(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('foto')
                ->disk('public'),
            TextColumn::make('nama')
                ->searchable(),
            TextColumn::make('jabatan'),
            TextColumn::make('urutan')
                ->sortable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            EditAction::make(),
            DeleteAction::make(),
        ])
        ->bulkActions([
            DeleteBulkAction::make(),
        ]);
    }
}