<?php

namespace App\Filament\Resources\SchoolDetails;

use App\Filament\Resources\SchoolDetails\Pages\CreateSchoolDetail;
use App\Filament\Resources\SchoolDetails\Pages\EditSchoolDetail;
use App\Filament\Resources\SchoolDetails\Pages\ListSchoolDetails;
use App\Filament\Resources\SchoolDetails\Schemas\SchoolDetailForm;
use App\Filament\Resources\SchoolDetails\Tables\SchoolDetailsTable;
use App\Models\SchoolDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SchoolDetailResource extends Resource
{
    protected static ?string $model = SchoolDetail::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return SchoolDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchoolDetailsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSchoolDetails::route('/'),
            'create' => CreateSchoolDetail::route('/create'),
            'edit' => EditSchoolDetail::route('/{record}/edit'),
        ];
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Beranda';
    }
}
