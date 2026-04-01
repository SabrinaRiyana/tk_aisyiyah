<?php

namespace App\Filament\Resources\SchoolDetails\Pages;

use App\Filament\Resources\SchoolDetails\SchoolDetailResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSchoolDetail extends CreateRecord
{
    protected static string $resource = SchoolDetailResource::class;
    protected static ?string $title = 'Tambah Tentang Sekolah';
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
