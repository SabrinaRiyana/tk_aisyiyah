<?php

namespace App\Filament\Resources\Pins\Pages;

use App\Filament\Resources\Pins\PinResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPin extends EditRecord
{
    protected static string $resource = PinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
