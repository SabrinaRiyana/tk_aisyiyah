<?php

namespace App\Filament\Resources\Banners\Pages;

use App\Filament\Resources\Banners\BannerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBanner extends CreateRecord
{
    protected static string $resource = BannerResource::class;
    protected static ?string $title = 'Tambah Banner';
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
