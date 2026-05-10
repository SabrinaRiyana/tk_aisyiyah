<?php

namespace App\Filament\Resources\Pins\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PinForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_pin')
                    ->label('Kode PIN')
                    ->required()
                    ->unique(ignoreRecord: true),

                Select::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'dipakai' => 'Dipakai',
                    ])
                    ->default('aktif')
                    ->required(),
            ]);
    }
}