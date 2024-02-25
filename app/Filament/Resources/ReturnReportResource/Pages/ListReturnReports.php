<?php

namespace App\Filament\Resources\ReturnReportResource\Pages;

use App\Filament\Resources\ReturnReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Str;

class ListReturnReports extends ListRecords
{
    protected static string $resource = ReturnReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->modalWidth(MaxWidth::FiveExtraLarge)
                ->successNotificationTitle('Reporte de devolucion creado con exito!')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['guide_number'] = Str::of($data['guide_number'])->upper();
                    
                    return $data;
                }),
        ];
    }
    
    public function getBreadcrumb(): ?string
    {
        return null;
    }
}
