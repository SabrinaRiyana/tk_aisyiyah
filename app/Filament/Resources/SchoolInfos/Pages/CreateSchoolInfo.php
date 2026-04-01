<?php

namespace App\Filament\Resources\SchoolInfos\Pages;

use App\Filament\Resources\SchoolInfos\SchoolInfoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSchoolInfo extends CreateRecord
{
    protected static string $resource = SchoolInfoResource::class;
    protected static ?string $title = 'Tambah Info Sekolah';
    protected function getCreateFormAction(): \Filament\Actions\Action
{
    return parent::getCreateFormAction()
        ->label('Simpan');
}

protected function getCreateAnotherFormAction(): \Filament\Actions\Action
{
    return parent::getCreateAnotherFormAction()
        ->label('Simpan & Tambah Lagi');
}

protected function getCancelFormAction(): \Filament\Actions\Action
{
    return parent::getCancelFormAction()
        ->label('Batal');
}
}
