<?php

namespace App\Filament\Resources\SchoolInfos\Pages;

use App\Filament\Resources\SchoolInfos\SchoolInfoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSchoolInfo extends EditRecord
{
    protected static string $resource = SchoolInfoResource::class;
    protected static ?string $title = 'Ubah Info Sekolah';

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Hapus'),
        ];
    }
}
