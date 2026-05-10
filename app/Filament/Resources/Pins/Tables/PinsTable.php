<?php

namespace App\Filament\Resources\Pins\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Tables;
use Filament\Tables\Table;

class PinsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_pin')
                    ->label('Kode PIN')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'dipakai' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i'),
            ])

            ->actions([
                DeleteAction::make()
                    ->label('Hapus')
                    ->requiresConfirmation()
                    ->color('danger')
                    ->modalHeading('Hapus PIN')
                    ->modalDescription('Apakah Anda yakin ingin melakukan ini?')
                    ->modalSubmitActionLabel('Hapus')
                    ->modalCancelActionLabel('Batal'),
            ])

            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}