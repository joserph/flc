<?php

namespace App\Filament\Resources\ReturnReportItemResource\Pages;

use App\Filament\Resources\ReturnReportItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReturnReportItem extends EditRecord
{
    protected static string $resource = ReturnReportItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
