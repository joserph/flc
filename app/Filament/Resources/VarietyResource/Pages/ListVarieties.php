<?php

namespace App\Filament\Resources\VarietyResource\Pages;

use App\Filament\Resources\VarietyResource;
use App\Models\User;
use App\Models\Variety;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;

class ListVarieties extends ListRecords
{
    protected static string $resource = VarietyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->successNotificationTitle('Variedad creada con exito!')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['name'] = Str::of($data['name'])->upper();
                    
                    return $data;
                }),
        ];
    }

    public function getBreadcrumb(): ?string
    {
        return null;
    }

    public function getTabs(): array
    {
        $tabs = [];
        // dd(User::isSuperAdmin());
        if(User::isSuperAdmin() || User::isAdmin())
        {
            $tabs['active'] = Tab::make('Activas')
                ->badge(Variety::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });

            $tabs['archived'] = Tab::make('Archivadas')
                ->badge(Variety::onlyTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->onlyTrashed();
                });
        }else{
            // dd(auth()->user()->roles[0]['name']);
            $tabs['active'] = Tab::make('Activas')
                ->badge(Variety::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });
        }
        
        return $tabs;
    }
}
