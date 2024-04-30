<?php

namespace App\Services;

use App\Models\Product;
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
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->label('Nombre de la Variedad')
                        ->required(),
                    Forms\Components\Select::make('product_id')
                        // ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->required()
                        ->label('Producto')
                        ->preload()
                        ->relationship('product', 'name')
                        // ->options(Product::query()->pluck('name', 'id'))
                        
                ])
        ];
    }
}