<?php

namespace App\Filament\Resources\DiseaseResource\Pages;

use App\Filament\Resources\DiseaseResource;
use App\Models\Disease;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;

class ListDiseases extends ListRecords
{
    protected static string $resource = DiseaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->successNotificationTitle('Enfermedad creada con exito!')
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
        
        if(User::isSuperAdmin() || User::isAdmin())
        {
            $tabs['all'] = Tab::make('Totas')
                ->badge(Disease::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });

            $tabs['apariencia'] = Tab::make('Apariencia')
                ->badge(Disease::where('type', 'apariencia')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'apariencia')->withoutTrashed();
                });

            $tabs['empaque'] = Tab::make('Empaque')
                ->badge(Disease::where('type', 'empaque')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'empaque')->withoutTrashed();
                });
            
            $tabs['follaje'] = Tab::make('Follaje')
                ->badge(Disease::where('type', 'follaje')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'follaje')->withoutTrashed();
                });
            
            $tabs['flor'] = Tab::make('Flor')
                ->badge(Disease::where('type', 'flor')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'flor')->withoutTrashed();
                });

            $tabs['sanidad'] = Tab::make('Sanidad')
                ->badge(Disease::where('type', 'sanidad')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'sanidad')->withoutTrashed();
                });
            
            $tabs['tallos'] = Tab::make('Tallos')
                ->badge(Disease::where('type', 'tallos')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'tallos')->withoutTrashed();
                });

            $tabs['archived'] = Tab::make('Archivadas')
                ->badge(Disease::onlyTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->onlyTrashed();
                });
        }else{
            $tabs['all'] = Tab::make('Totas')
                ->badge(Disease::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });
                
                $tabs['apariencia'] = Tab::make('Apariencia')
                ->badge(Disease::where('type', 'apariencia')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'apariencia')->withoutTrashed();
                });

            $tabs['empaque'] = Tab::make('Empaque')
                ->badge(Disease::where('type', 'empaque')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'empaque')->withoutTrashed();
                });
            
            $tabs['follaje'] = Tab::make('Follaje')
                ->badge(Disease::where('type', 'follaje')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'follaje')->withoutTrashed();
                });
            
            $tabs['flor'] = Tab::make('Flor')
                ->badge(Disease::where('type', 'flor')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'flor')->withoutTrashed();
                });

            $tabs['sanidad'] = Tab::make('Sanidad')
                ->badge(Disease::where('type', 'sanidad')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'sanidad')->withoutTrashed();
                });
            
            $tabs['tallos'] = Tab::make('Tallos')
                ->badge(Disease::where('type', 'tallos')->count())
                ->modifyQueryUsing(function($query){
                    return $query->where('type', 'tallos')->withoutTrashed();
                });
        }
        
        return $tabs;
    }
}
