<?php

namespace App\Filament\Resources\SchoolInfos\Pages;

use App\Filament\Resources\SchoolInfos\SchoolInfoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSchoolInfo extends EditRecord
{
    protected static string $resource = SchoolInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
