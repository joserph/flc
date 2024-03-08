<?php

namespace App\Filament\Resources\DialingResource\Pages;

use App\Filament\Resources\DialingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDialing extends EditRecord
{
    protected static string $resource = DialingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
