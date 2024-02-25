<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'date',
        'logistic_id',
        'guide_type',
        'guide_number',
        'destination',
    ];

    public function returnReportItems(): HasMany
    {
        return $this->hasMany(ReturnReportItem::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function logistic(): BelongsTo
    {
        return $this->belongsTo(Logistic::class);
    }
}
