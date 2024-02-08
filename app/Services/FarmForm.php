<?php

namespace App\Services;

use Filament\Forms;
use Illuminate\Support\Facades\Auth;

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
                        ->columnSpan(2)
                        ->label('Nombre de la finca')
                        ->required(),
                    Forms\Components\TextInput::make('tradename')
                        ->autofocus()
                        ->columnSpan(2)
                        ->label('Nombre Comercial'),
                    Forms\Components\TextInput::make('ruc')
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