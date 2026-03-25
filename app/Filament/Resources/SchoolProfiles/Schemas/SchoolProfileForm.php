<?php

namespace App\Filament\Resources\SchoolProfiles\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class SchoolProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Visi & Tujuan')
                    ->components([
                        Textarea::make('visi')->required(),
                        Textarea::make('tujuan')->required(),
                    ]),
                Section::make('Misi')
                    ->components([
                        Repeater::make('misi')
                            ->components([
                                TextInput::make('item')->required(),
                            ])
                            ->maxItems(4)
                    ]),
            ]);
    }
}