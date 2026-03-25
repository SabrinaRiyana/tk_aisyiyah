<?php

namespace App\Filament\Resources\Suggestions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SuggestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('nama')
                ->label('Nama'),

            TextInput::make('rating')
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->label('Rating'),

            Textarea::make('pesan')
                ->label('Pesan'),

        ]);
    }
}
