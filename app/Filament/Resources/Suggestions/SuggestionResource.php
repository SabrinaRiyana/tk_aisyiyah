<?php

namespace App\Filament\Resources\Suggestions;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use App\Models\Suggestion;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\CreateAction;

use App\Filament\Resources\Suggestions\Pages\CreateSuggestion;
use App\Filament\Resources\Suggestions\Pages\EditSuggestion;
use App\Filament\Resources\Suggestions\Pages\ListSuggestions;
use App\Filament\Resources\Suggestions\Schemas\SuggestionForm;
use App\Filament\Resources\Suggestions\Tables\SuggestionsTable;

use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;


class SuggestionResource extends Resource
{
    protected static ?string $model = Suggestion::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $recordTitleAttribute = 'nama';
    protected static ?string $navigationLabel = 'Testimoni & Saran';

    public static function form(Schema $schema): Schema
    {
        return SuggestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Pengirim')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '5' => 'success',
                        '4' => 'info',
                        '3' => 'warning',
                        default => 'danger',
                    })
                    ->formatStateUsing(fn ($state) => "⭐ $state"),

                TextColumn::make('pesan')
                    ->label('Pesan')
                    ->limit(50)
                    ->wrap(),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter jika perlu
            ])
            ->actions([
                EditAction::make()
                    ->label('Edit'),
                DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => ListSuggestions::route('/'),
            'create' => CreateSuggestion::route('/create'),
            'edit' => EditSuggestion::route('/{record}/edit'),
        ];
        
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Galeri';
    }
    public static function getModelLabel(): string
    {
        return 'Saran';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Daftar Saran';
    }
}
