<?php

namespace App\Filament\Resources\Banners;

use App\Filament\Resources\Banners\Pages\ListBanners;
use App\Filament\Resources\Banners\Pages\CreateBanner;
use App\Filament\Resources\Banners\Pages\EditBanner;
use App\Models\Banner;

use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;

use BackedEnum;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Banner';

    protected static string|\UnitEnum|null $navigationGroup = 'Beranda';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('page')
                    ->options([
                        'beranda' => 'Beranda',
                        'profil' => 'Profil',
                        'galeri' => 'Galeri',
                        'ppdb' => 'PPDB',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('banners')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page')
                    ->label('Halaman')
                    ->badge(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBanners::route('/'),
            'create' => CreateBanner::route('/create'),
            'edit' => EditBanner::route('/{record}/edit'),
        ];
    }
}