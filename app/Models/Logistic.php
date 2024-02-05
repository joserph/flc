<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logistic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'ruc',
        'phone',
        'address',
        'state',
        'city',
        'country',
        'user_update',
        'image_url',
        'user_id'
    ];
}
