<?php

namespace App\Filament\Resources\DialingResource\Pages;

use App\Filament\Resources\DialingResource;
use App\Models\Dialing;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;

class ListDialings extends ListRecords
{
    protected static string $resource = DialingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->successNotificationTitle('Marcacion creada con exito!')
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
            $tabs['all'] = Tab::make('Totas')
                ->badge(Dialing::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });

            $tabs['active'] = Tab::make('Activas')
                ->badge(Dialing::where('status', 'activa')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'activa')->withoutTrashed();
                });

            $tabs['suspended'] = Tab::make('Suspendidas')
                ->badge(Dialing::where('status', 'suspendida')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'suspendida')->withoutTrashed();
                });
            
            $tabs['closed'] = Tab::make('Cerradas')
                ->badge(Dialing::where('status', 'cerrada')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'cerrada')->withoutTrashed();
                });

            $tabs['archived'] = Tab::make('Archivadas')
                ->badge(Dialing::onlyTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->onlyTrashed();
                });
        }else{
            $tabs['all'] = Tab::make('Totas')
                ->badge(Dialing::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });
                
            $tabs['active'] = Tab::make('Activas')
                ->badge(Dialing::where('status', 'activa')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'activa')->withoutTrashed();
                });

            $tabs['suspended'] = Tab::make('Suspendidas')
                ->badge(Dialing::where('status', 'suspendida')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'suspendida')->withoutTrashed();
                });
            
            $tabs['closed'] = Tab::make('Cerradas')
                ->badge(Dialing::where('status', 'cerrada')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'cerrada')->withoutTrashed();
                });
        }
        
        return $tabs;
    }
}
