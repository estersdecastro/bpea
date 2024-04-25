<?php

namespace App\Filament\Resources\PeaResource\Pages;

use App\Filament\Resources\PeaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeas extends ListRecords
{
    protected static string $resource = PeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
