<?php

namespace App\Models;

use App\Enums\FarmStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'tradename',
        'ruc',
        'address',
        'state',
        'city',
        'country',
        'phone',
        'cell_phone',
        'email',
        'agroquality_code',
        'status'
    ];

    protected $casts = [
        'status' => FarmStatus::class
    ];
}
