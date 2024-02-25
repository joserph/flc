<?php

namespace App\Filament\Resources\ReturnReportResource\Pages;

use App\Filament\Resources\ReturnReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReturnReport extends EditRecord
{
    protected static string $resource = ReturnReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
