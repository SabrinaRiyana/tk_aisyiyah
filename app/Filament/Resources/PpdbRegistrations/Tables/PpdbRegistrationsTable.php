<?php

namespace App\Filament\Resources\PpdbRegistrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PpdbRegistrationsTable
{
    public static function table(Table $table): Table
    {
    return $table
        ->columns([
            // Menampilkan info dasar, misal kita ambil "Nama Lengkap" dari dalam JSON
            TextColumn::make('payload.Nama Lengkap')
                ->label('Nama Calon Siswa'),
                
            TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'success' => 'success',
                    'failed' => 'danger',
                }),
                
            TextColumn::make('created_at')
                ->label('Tgl Daftar')
                ->dateTime(),
        ]);
    }
}
