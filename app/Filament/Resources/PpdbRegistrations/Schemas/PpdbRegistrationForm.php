<?php

namespace App\Filament\Resources\PpdbRegistrations\Schemas;

use Filament\Schemas\Schema;

class PpdbRegistrationForm
{
    public static function form(Form $form): Form
    {
    return $form
        ->schema([
            // Menampilkan semua isi JSON secara otomatis
            KeyValue::make('payload')
                ->label('Data Pendaftaran')
                ->columnSpanFull(),
        ]);
    }
}
