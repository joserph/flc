<?php

namespace App\Services;

use Filament\Forms;

final class ProductForm
{
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
                        ->label('Nombre del Producto')
                        ->required(),
                    Forms\Components\TextInput::make('scientific_name')
                        // ->unique(ignoreRecord: true)
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->columnSpan(2)
                        ->label('Nombre Cientifico'),
                ])
        ];
    }
}