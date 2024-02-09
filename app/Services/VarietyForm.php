<?php

namespace App\Services;

use Filament\Forms;

final class VarietyForm
{
    public static function schema(): array
    {
        return [
            Forms\Components\Grid::make(4)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->autofocus()
                        ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->label('Nombre de la Variedad')
                        ->required(),
                    // Forms\Components\TextInput::make('scientific_name')
                    //     ->unique(ignoreRecord: true)
                    //     ->columnSpan(2)
                    //     ->label('Nombre Cientifico'),
                ])
        ];
    }
}