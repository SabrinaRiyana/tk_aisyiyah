<?php
namespace App\Filament\Resources\SchoolInfos;

use App\Filament\Resources\SchoolInfos\Pages\ListSchoolInfos;
use App\Filament\Resources\SchoolInfos\Pages\CreateSchoolInfo;
use App\Filament\Resources\SchoolInfos\Pages\EditSchoolInfo;

use App\Models\SchoolInfo;

use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;

use BackedEnum;

class SchoolInfoResource extends Resource
{
    protected static ?string $model = SchoolInfo::class;
    protected static ?string $navigationLabel = 'Info Sekolah';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';

   public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->label('Key (contoh: alamat, email, instagram, telepon, rekening, maps_link)')
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\Textarea::make('value')
                    ->label('Value (isi info sekolah)')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')->sortable(),
                Tables\Columns\TextColumn::make('value')->wrap(),
            ])
            ->actions([
                EditAction::make()
                    ->label('Edit'),
                DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
                    ->label('Hapus'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSchoolInfos::route('/'),
            'create' => CreateSchoolInfo::route('/create'),
            'edit' => EditSchoolInfo::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return 'Info Sekolah';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Info Sekolah';
    }
}