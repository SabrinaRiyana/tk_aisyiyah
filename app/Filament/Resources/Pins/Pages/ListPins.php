<?php

namespace App\Filament\Resources\Pins\Pages;

use App\Filament\Resources\Pins\PinResource;
use App\Models\Pin;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPins extends ListRecords
{
    protected static string $resource = PinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('generatePin')
                ->label('Generate/Buat PIN')
                ->icon('heroicon-o-plus')
                ->action(function () {

                    $random = 'TKA-' . rand(10000, 99999);

                    Pin::create([
                        'kode_pin' => $random,
                        'status' => 'aktif',
                    ]);
                })
        ];
    }
}