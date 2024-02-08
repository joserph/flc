<?php

namespace App\Services;

use Filament\Forms;
use Illuminate\Support\Facades\Auth;

final class LogisticForm
{
    public static function schema(): array
    {
        return [
            Forms\Components\Grid::make(3)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->autofocus()
                        ->columnSpan(2)
                        ->label('Nombre de la empresa')
                        ->required(),
                    Forms\Components\TextInput::make('ruc')
                        ->numeric()
                        ->maxLength(13)
                        ->label('RUC')
                        ->required(),
                    Forms\Components\TextInput::make('phone')
                        ->numeric()
                        ->prefix('+')
                        ->label('Telefono')
                        ->required(),
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
                    Forms\Components\FileUpload::make('image_url')
                        ->directory('company-image')
                        ->image()
                        ->imageEditor()
                ])
        ];
    }
}