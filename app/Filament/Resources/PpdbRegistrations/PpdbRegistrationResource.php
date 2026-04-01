<?php

namespace App\Filament\Resources\PpdbRegistrations;

use App\Filament\Resources\PpdbRegistrations\Pages\CreatePpdbRegistration;
use App\Filament\Resources\PpdbRegistrations\Pages\EditPpdbRegistration;
use App\Filament\Resources\PpdbRegistrations\Pages\ListPpdbRegistrations;
use App\Filament\Resources\PpdbRegistrations\Schemas\PpdbRegistrationForm;
use App\Filament\Resources\PpdbRegistrations\Tables\PpdbRegistrationsTable;
use App\Models\PpdbRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\PpdbSetting;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;


use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class PpdbRegistrationResource extends Resource
{
    protected static ?string $model = PpdbRegistration::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $recordTitleAttribute = 'nama';
    protected static ?string $navigationLabel = 'Data Pendaftaran';

    public static function form(Schema $schema): Schema
    {
        $setting = \App\Models\PpdbSetting::first();
        $fields = [];

        if ($setting && $setting->form_fields) {
            foreach ($setting->form_fields as $field) {
                // pastikan ada name
                $name = $field['name'] ?? Str::slug($field['label'], '_');

                if ($field['type'] === 'text') {
                    $fields[] = TextInput::make($name)
                        ->label($field['label'])
                        ->required($field['required'] ?? false);
                } elseif ($field['type'] === 'file') {
                    $fields[] = FileUpload::make($name)
                        ->label($field['label'])
                        ->required($field['required'] ?? false);
                }
            }
        }

        return $schema->schema($fields);
    }

    public static function table(Table $table): Table
    {
        $setting = \App\Models\PpdbSetting::first();
        $formFields = $setting?->form_fields ?? [];

        return $table
            ->columns([
                ...collect($formFields)
                ->filter(fn ($field) => in_array($field['type'], ['text', 'file']))
                ->map(function ($field) {

                    if ($field['type'] === 'text') {
                        return TextColumn::make("payload.{$field['label']}")
                            ->label($field['label'])
                            ->searchable()
                            ->toggleable();
                    }

                    if ($field['type'] === 'file') {
                        return ImageColumn::make($field['label'])
                        ->label($field['label'])
                        ->getStateUsing(fn ($record) => 
                            asset('storage/' . ($record->payload[$field['label']] ?? ''))
                        )
                        ->height(60);
                    }

                })
                ->values() // ⬅️ penting
                ->toArray(),

                // STATUS
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'success' => 'success',
                        default => 'gray',
                    }),

                // CREATED AT
                TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make('Print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(fn ($record) => route('ppdb.print', $record))
                    ->openUrlInNewTab(),

                DeleteAction::make()
                    ->label('Hapus'),
            ])
           ->headerActions([
                ExportAction::make()
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->withFilename('Data_PPDB_' . date('Y-m-d')),
                    ])
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
            'index' => ListPpdbRegistrations::route('/'),
            'create' => CreatePpdbRegistration::route('/create'),
            'edit' => EditPpdbRegistration::route('/{record}/edit'),
        ];
    }
      public static function getNavigationGroup(): ?string
    {
        return 'PPDB';
    }

    public static function getModelLabel(): string
    {
        return 'Data Pendaftaran';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Data Pendaftaran';
    }
}
