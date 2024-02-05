<?php

namespace App\Filament\Resources\LogisticResource\Pages;

use App\Filament\Resources\LogisticResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLogistic extends CreateRecord
{
    protected static string $resource = LogisticResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Empresa de Logistica creada con exito!';
    }
}
