<?php

namespace App\Filament\Pages;

use BackedEnum;
use App\Models\PpdbSetting as PpdbSettingModel;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Utilities\Get;

class PpdbSetting extends Page
{
    use InteractsWithForms;

    // Pakai cara ini biar PHP gak protes soal Type Hinting
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Setting SPMB';

    protected static ?string $title = 'Pengaturan SPMB';

    protected string $view = 'filament.pages.ppdb-setting';

    public ?array $data = [];

    public function mount(): void
    {
        // Pastikan panggil Modelnya lewat Alias agar tidak conflict dengan nama Class Page
        $setting = PpdbSettingModel::firstOrCreate(['id' => 1]);
        $this->form->fill($setting->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Status Sistem')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('SPMB Aktif (ON/OFF)')
                            ->helperText('Jika ON, form pendaftaran muncul di web. Jika OFF, form disembunyikan.')
                            ->live(), 
                    ]),

                Section::make('Pengaturan Saat SPMB TUTUP')
                    ->description('Edit struktur form hanya bisa dilakukan saat SPMB sedang OFF.')
                    ->schema([
                        Textarea::make('closed_message')
                            ->label('Pesan Penutupan')
                            ->placeholder('Maaf, pendaftaran sedang ditutup...'),

                        Repeater::make('form_fields')
                            ->label('Struktur Form Pendaftaran')
                            ->hidden(fn (Get $get) => $get('is_active') == true) 
                            ->schema([
                                TextInput::make('label')->required()->placeholder('Contoh: Nama Lengkap'),
                                Select::make('type')
                                    ->options([
                                        'text' => 'Teks',
                                        'number' => 'Angka/HP',
                                        'date' => 'Tanggal',
                                        'email' => 'Email',
                                        'file' => 'Upload File (PDF/Image)',
                                    ])->required(),
                                Toggle::make('required')->label('Wajib Diisi?'),
                            ])
                            ->createItemButtonLabel('Tambah Kolom Form'),
                    ]),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Pengaturan')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        // Simpan ke database lewat Model
        PpdbSettingModel::updateOrCreate(['id' => 1], $data);

        Notification::make()
            ->title('Berhasil disimpan!')
            ->success()
            ->send();
    }
    public static function getNavigationGroup(): ?string
    {
        return 'SPMB';
    }
}