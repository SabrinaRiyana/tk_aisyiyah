<?php

namespace App\Filament\Resources\SchoolDetails\Pages;

use App\Filament\Resources\SchoolDetails\SchoolDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSchoolDetail extends EditRecord
{
    protected static string $resource = SchoolDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
