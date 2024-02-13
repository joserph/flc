<?php

namespace App\Services;

use Filament\Forms;

final class DiseaseForm
{
    protected static array $typeDisease = [
        'apariencia'    => 'Apariencia',
        'empaque'       => 'Empaque',
        'follaje'       => 'Follaje',
        'flor'          => 'Flor',
        'sanidad'       => 'Sanidad',
        'tallos'        => 'Tallos',
    ];

    public static function schema(): array
    {
        return [
            Forms\Components\Grid::make(4)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->autofocus()
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->label('Nombre de la enfermedad')
                        ->required(),
                    Forms\Components\Select::make('type')
                        ->options(self::$typeDisease)
                        ->columnSpan(2)
                        ->label('Tipo'),
                ])
        ];
    }
}