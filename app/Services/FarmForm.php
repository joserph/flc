<?php

namespace App\Services;

use App\Models\Farm;
use Filament\Forms;

final class FarmForm
{
    protected static array $statuses = [
        'activa'        => 'Activa',
        'suspendida'    => 'Suspendida',
        'cerrada'       => 'Cerrada',
    ];

    public static function schema(): array
    {
        return [
            Forms\Components\Grid::make(4)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->autofocus()
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->columnSpan(2)
                        ->label('Nombre de la finca')
                        ->unique(ignoreRecord: true)
                        ->required(),
                    Forms\Components\TextInput::make('tradename')
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->label('Nombre Comercial'),
                    Forms\Components\TextInput::make('ruc')
                        ->unique(ignoreRecord: true)
                        ->numeric()
                        ->maxLength(13)
                        ->label('RUC')
                        ->required(),
                    Forms\Components\TextInput::make('phone')
                        ->numeric()
                        ->prefix('+')
                        ->label('Telefono'),
                    Forms\Components\TextInput::make('cell_phone')
                        ->numeric()
                        ->prefix('+')
                        ->label('Celular'),
                    Forms\Components\TextInput::make('email')
                        ->label('Correo')
                        ->required(),
                    Forms\Components\TextInput::make('address')
                        ->columnSpan(2)
                        ->label('Direccion')
                        ->required(),
                    Forms\Components\TextInput::make('state')
                        ->label('Estado')
                        ->required(),
                    Forms\Components\TextInput::make('city')
                        ->label('Ciudad')
                        ->required(),
                    Forms\Components\TextInput::make('country')
                        ->label('Pais')
                        ->required(),
                    Forms\Components\TextInput::make('agroquality_code')
                        ->label('Codigo Agricultura'),
                    Forms\Components\Select::make('status')
                        ->options(self::$statuses)
                        ->required()
                ])
        ];
    }
}