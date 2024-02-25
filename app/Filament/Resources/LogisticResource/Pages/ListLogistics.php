<?php

namespace App\Filament\Resources\LogisticResource\Pages;

use App\Filament\Resources\LogisticResource;
use App\Models\Logistic;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;

class ListLogistics extends ListRecords
{
    protected static string $resource = LogisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->successNotificationTitle('Empresa de Logistica creada con exito!')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['name'] = Str::of($data['name'])->upper();
                    $data['address'] = Str::of($data['address'])->apa();
                    $data['state'] = Str::of($data['state'])->upper();
                    $data['city'] = Str::of($data['city'])->upper();
                    
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
        
        if(User::isSuperAdmin() || User::isAdmin())
        {
            
            $tabs['active'] = Tab::make('Activas')
                ->badge(Logistic::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });

            $tabs['archived'] = Tab::make('Archivadas')
                ->badge(Logistic::onlyTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->onlyTrashed();
                });
        }else{
            // dd(auth()->user()->roles[0]['name']);
            $tabs['active'] = Tab::make('Activas')
                ->badge(Logistic::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });
        }
        
        return $tabs;
    }
}
