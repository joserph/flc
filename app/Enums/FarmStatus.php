<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum FarmStatus: string implements HasLabel, HasColor, HasIcon
{
    case ACTIVE = 'activa';
    case SUSPENDED = 'suspendida';
    case CLOSED = 'cerrada';

    public function getLabel(): ?string
    {
        return match ($this){
            self::ACTIVE => 'activa',
            self::SUSPENDED => 'suspendida',
            self::CLOSED => 'cerrada',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this){
            self::ACTIVE => 'success',
            self::SUSPENDED => 'warning',
            self::CLOSED => 'gray',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this){
            self::ACTIVE => 'heroicon-o-check-badge',
            self::SUSPENDED => 'heroicon-o-exclamation-triangle',
            self::CLOSED => 'heroicon-o-no-symbol',
        };
    }
}