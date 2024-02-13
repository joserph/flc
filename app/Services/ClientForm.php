<?php

namespace App\Services;

use Filament\Forms;

final class ClientForm
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
                        ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->label('Nombre del cliente')
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
                        ->label('Correo'),
                    Forms\Components\TextInput::make('address')
                        ->columnSpan(2)
                        ->label('Direccion'),
                    Forms\Components\TextInput::make('state')
                        ->label('Estado'),
                    Forms\Components\TextInput::make('city')
                        ->label('Ciudad'),
                    Forms\Components\TextInput::make('zip_code')
                        ->label('Zip code'),
                    Forms\Components\TextInput::make('country')
                        ->label('Pais'),
                    Forms\Components\Select::make('logistic_id')
                        ->relationship('logistic', 'name')
                        ->required(),
                    Forms\Components\Select::make('status')
                        ->options(self::$statuses)
                        ->required(),
                    
                ])
        ];
    }
}