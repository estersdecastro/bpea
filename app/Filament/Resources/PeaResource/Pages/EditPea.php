<?php

namespace App\Filament\Resources\PeaResource\Pages;

use App\Filament\Resources\PeaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPea extends EditRecord
{
    protected static string $resource = PeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
