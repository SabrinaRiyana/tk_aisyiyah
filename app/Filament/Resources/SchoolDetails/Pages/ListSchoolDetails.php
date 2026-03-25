<?php

namespace App\Filament\Resources\SchoolDetails\Pages;

use App\Filament\Resources\SchoolDetails\SchoolDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSchoolDetails extends ListRecords
{
    protected static string $resource = SchoolDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
