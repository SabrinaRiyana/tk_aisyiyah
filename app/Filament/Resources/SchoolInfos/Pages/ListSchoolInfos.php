<?php

namespace App\Filament\Resources\SchoolInfos\Pages;

use App\Filament\Resources\SchoolInfos\SchoolInfoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSchoolInfos extends ListRecords
{
    protected static string $resource = SchoolInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
