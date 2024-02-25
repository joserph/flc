<?php

namespace App\Filament\Resources\FarmResource\Pages;

use App\Filament\Resources\FarmResource;
use App\Models\Farm;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;

class ListFarms extends ListRecords
{
    protected static string $resource = FarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->successNotificationTitle('Finca creada con exito!')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['name'] = Str::of($data['name'])->upper();
                    $data['tradename'] = Str::of($data['tradename'])->upper();
                    $data['address'] = Str::of($data['address'])->apa();
                    $data['state'] = Str::of($data['state'])->upper();
                    $data['city'] = Str::of($data['city'])->upper();
                    $data['agroquality_code'] = Str::of($data['agroquality_code'])->upper();
                    
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
                ->badge(Farm::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });

            $tabs['active'] = Tab::make('Activas')
                ->badge(Farm::where('status', 'activa')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'activa')->withoutTrashed();
                });

            $tabs['suspended'] = Tab::make('Suspendidas')
                ->badge(Farm::where('status', 'suspendida')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'suspendida')->withoutTrashed();
                });
            
            $tabs['closed'] = Tab::make('Cerradas')
                ->badge(Farm::where('status', 'cerrada')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'cerrada')->withoutTrashed();
                });

            $tabs['archived'] = Tab::make('Archivadas')
                ->badge(Farm::onlyTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->onlyTrashed();
                });
        }else{
            $tabs['all'] = Tab::make('Totas')
                ->badge(Farm::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });
                
            $tabs['active'] = Tab::make('Activas')
                ->badge(Farm::where('status', 'activa')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'activa')->withoutTrashed();
                });

            $tabs['suspended'] = Tab::make('Suspendidas')
                ->badge(Farm::where('status', 'suspendida')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'suspendida')->withoutTrashed();
                });
            
            $tabs['closed'] = Tab::make('Cerradas')
                ->badge(Farm::where('status', 'cerrada')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('status', 'cerrada')->withoutTrashed();
                });
        }
        
        return $tabs;
    }
}
