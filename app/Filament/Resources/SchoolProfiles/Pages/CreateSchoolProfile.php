<?php

namespace App\Filament\Resources\SchoolProfiles\Pages;

use App\Filament\Resources\SchoolProfiles\SchoolProfileResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSchoolProfile extends CreateRecord
{
    protected static string $resource = SchoolProfileResource::class;
    protected static ?string $title = 'Tambah Visi Misi';
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
