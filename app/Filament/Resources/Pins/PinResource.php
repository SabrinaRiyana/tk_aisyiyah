<?php

namespace App\Filament\Resources\Pins;

use App\Filament\Resources\Pins\Pages\CreatePin;
use App\Filament\Resources\Pins\Pages\EditPin;
use App\Filament\Resources\Pins\Pages\ListPins;
use App\Filament\Resources\Pins\Schemas\PinForm;
use App\Filament\Resources\Pins\Tables\PinsTable;
use App\Models\Pin;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PinResource extends Resource
{
    protected static ?string $model = Pin::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTicket;

    protected static ?string $navigationLabel = 'PIN Pendaftaran';

    protected static ?string $modelLabel = 'PIN';

    protected static ?string $pluralModelLabel = 'PIN Pendaftaran';

    public static function form(Schema $schema): Schema
    {
        return PinForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PinsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPins::route('/'),
            'create' => CreatePin::route('/create'),
            'edit' => EditPin::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'SPMB';
    }
}