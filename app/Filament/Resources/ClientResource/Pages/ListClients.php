<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\Client;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListClients extends ListRecords
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->successNotificationTitle('Finca creada con exito!'),
        ];
    }

    public function getBreadcrumb(): ?string
    {
        return null;
    }

    public function getTabs(): array
    {
        $tabs = [];
        
        if(auth()->user()->isSuperAdmin() || auth()->user()->isAdmin())
        {
            $tabs['all'] = Tab::make('Totas')
                ->badge(Client::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });

            $tabs['active'] = Tab::make('Activas')
                ->badge(Client::where('status', 'activa')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'activa')->withoutTrashed();
                });

            $tabs['suspended'] = Tab::make('Suspendidas')
                ->badge(Client::where('status', 'suspendida')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'suspendida')->withoutTrashed();
                });
            
            $tabs['closed'] = Tab::make('Cerradas')
                ->badge(Client::where('status', 'cerrada')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'cerrada')->withoutTrashed();
                });

            $tabs['archived'] = Tab::make('Archivadas')
                ->badge(Client::onlyTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->onlyTrashed();
                });
        }else{
            $tabs['all'] = Tab::make('Totas')
                ->badge(Client::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });
                
            $tabs['active'] = Tab::make('Activas')
                ->badge(Client::where('status', 'activa')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'activa')->withoutTrashed();
                });

            $tabs['suspended'] = Tab::make('Suspendidas')
                ->badge(Client::where('status', 'suspendida')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'suspendida')->withoutTrashed();
                });
            
            $tabs['closed'] = Tab::make('Cerradas')
                ->badge(Client::where('status', 'cerrada')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'cerrada')->withoutTrashed();
                });
        }
        
        return $tabs;
    }
}
