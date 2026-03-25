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
    // Ambil settingan form yang terakhir dibuat Umi
    $setting = \App\Models\PpdbSetting::first();
    $formFields = $setting?->form_fields ?? [];

    return $table
        ->columns([
            // 1. Kolom Nama (Kita asumsikan Umi pasti bikin field "Nama Lengkap")
            // Kalau Umi ganti nama label, kolom ini otomatis ngikut
            ...collect($formFields)->map(function ($field) {
                return \Filament\Tables\Columns\TextColumn::make("payload.{$field['label']}")
                    ->label($field['label'])
                    ->searchable()
                    ->toggleable();
            })->toArray(),

            ImageColumn::make('payload.Kartu Keluarga')
                ->label('KK')
                ->disk('public')
                ->height(60),

            ImageColumn::make('payload.Akta Kelahiran')
                ->label('Akta')
                ->disk('public')
                ->height(60),

            ImageColumn::make('payload.FC KTP Wali')
                ->label('KTP Wali')
                ->disk('public')
                ->height(60),

            // 2. Kolom Status
            \Filament\Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'success' => 'success',
                    default => 'gray',
                }),

            \Filament\Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal Daftar')
                ->dateTime('d M Y H:i'),
        ])
        ->filters([
            // Kosongin aja kalau belum butuh
        ])
        ->actions([
            //ViewAction::make(),
            EditAction::make('Print')
                ->label('Print')
                ->icon('heroicon-o-printer')
                ->url(fn ($record) => route('ppdb.print', $record)) // Buat route khusus print nanti
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ])
        ->headerActions([
            ExportAction::make()
                ->exports([
                    ExcelExport::make()
                        ->fromTable() // Otomatis ambil kolom yang tampil di tabel
                        ->withFilename('Data_PPDB_' . date('Y-m-d')),
                ])
                ->label('Ekspor ke Excel')
                ->color('success')
                ->icon('heroicon-o-document-arrow-down'),
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
}
