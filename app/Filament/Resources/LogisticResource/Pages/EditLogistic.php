<?php

namespace App\Filament\Resources\LogisticResource\Pages;

use App\Filament\Resources\LogisticResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditLogistic extends EditRecord
{
    protected static string $resource = LogisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Empresa de Logistica actualizada con exito!';
    }
}
