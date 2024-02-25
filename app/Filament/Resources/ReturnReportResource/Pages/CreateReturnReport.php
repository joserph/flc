<?php

namespace App\Filament\Resources\ReturnReportResource\Pages;

use App\Filament\Resources\ReturnReportResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;

class CreateReturnReport extends CreateRecord
{
    protected static string $resource = ReturnReportResource::class;

    public function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->mutateFormDataUsing(function (array $data): array {
                $data['guide_number'] = 'Jola';
                dd($data);
                return $data;
            })
        ];
    }
}
