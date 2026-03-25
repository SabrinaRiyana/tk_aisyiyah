<?php

namespace App\Filament\Resources\SchoolProfiles\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

// ✅ Actions yang BENAR (Filament v4)
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class SchoolProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('visi')->limit(50),
                TextColumn::make('misi')->limit(50),
                TextColumn::make('tujuan')->limit(50),
                TextColumn::make('updated_at')->dateTime(),
            ])

           
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}