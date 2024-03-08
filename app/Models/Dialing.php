<?php

namespace App\Models;

use App\Enums\FarmStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dialing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'state',
        'city',
        'zip_code',
        'country',
        'phone',
        'cell_phone',
        'email',
        'status'
    ];

    protected $casts = [
        'status' => FarmStatus::class
    ];
}
