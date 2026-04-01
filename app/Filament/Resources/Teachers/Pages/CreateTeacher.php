<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Filament\Resources\Teachers\TeacherResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;
    protected static ?string $title = 'Tambah Guru';
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
