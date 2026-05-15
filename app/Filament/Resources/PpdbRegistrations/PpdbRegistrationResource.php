<?php

namespace App\Filament\Resources\PpdbRegistrations;

use App\Models\PpdbRegistration;
use App\Models\PpdbSetting;
use App\Filament\Resources\PpdbRegistrations\Pages\CreatePpdbRegistration;
use App\Filament\Resources\PpdbRegistrations\Pages\EditPpdbRegistration;
use App\Filament\Resources\PpdbRegistrations\Pages\ListPpdbRegistrations;
use App\Filament\Resources\PpdbRegistrations\DeleteAction;

use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

use Illuminate\Support\Str;
use BackedEnum;

class PpdbRegistrationResource extends Resource
{
    protected static ?string $model = PpdbRegistration::class;
    protected static ?string $navigationLabel = 'Data Pendaftaran';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    public static function form(Schema $schema): Schema
    {
        $setting = PpdbSetting::first();
        dd($setting->form_fields);

        $fields = [];

        if ($setting && $setting->form_fields) {
            foreach ($setting->form_fields as $field) {
                $name = $field['name'] ?? Str::slug($field['label'], '_');
                if ($field['type'] === 'text') {
                    $fields[] = Forms\Components\TextInput::make($name)->label($field['label']);
                } elseif ($field['type'] === 'file') {
                    $fields[] = Forms\Components\FileUpload::make($name)->label($field['label']);
                }
            }
        }
        return $schema->schema($fields);
    }

    public static function table(Table $table): Table
    {
        $setting = PpdbSetting::first();
        $formFields = $setting?->form_fields ?? [];

        $dynamicColumns = collect($formFields)
            ->filter(fn ($field) => in_array($field['type'], ['text', 'file']))
            ->map(function ($field) {
                if ($field['type'] === 'text') {
                    return Tables\Columns\TextColumn::make("payload.{$field['label']}")
                        ->label($field['label'])
                        ->searchable();
                }
                if ($field['type'] === 'file') {
                    return Tables\Columns\ImageColumn::make($field['label'])
                        ->label($field['label'])
                        ->getStateUsing(fn ($record) => 
                            isset($record->payload[$field['label']]) ? asset('storage/' . $record->payload[$field['label']]) : null
                        );
                }
            })
            ->filter()->values()->toArray();

        return $table
            ->columns([
                ...$dynamicColumns,
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'success' => 'success',
                        default => 'gray',
                    }),
            ])
            ->actions([
                \Filament\Actions\Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(fn ($record) => route('ppdb.print', $record))
                    ->openUrlInNewTab(),

                \Filament\Actions\DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->headerActions([
                \pxlrbt\FilamentExcel\Actions\Tables\ExportAction::make()
                    ->label('Export Excel')
                    ->exports([
                        \pxlrbt\FilamentExcel\Exports\ExcelExport::make()
                            ->fromTable()
                    ]),
            ])
            ->bulkActions([
                \Filament\Actions\DeleteBulkAction::make()
                    ->label('Hapus Terpilih'),
            ]);
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
        return 'SPMB';
    }
}