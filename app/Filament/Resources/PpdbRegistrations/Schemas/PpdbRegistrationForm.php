<?php

namespace App\Filament\Resources\PpdbRegistrations\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\KeyValue;

class PpdbRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                KeyValue::make('payload')
                    ->label('Data Pendaftaran')
                    ->columnSpanFull(),
            ]);
    }
}