<?php

namespace App\Models;

use App\Enums\FarmStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
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
        'logistic_id',
        'status'
    ];

    protected $casts = [
        'status' => FarmStatus::class
    ];

    public function logistic(): BelongsTo
    {
        return $this->belongsTo(Logistic::class);
    }
}
