<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnReportItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'return_report_id',
        'farm_id',
        'variety_id',
        'packing',
        'disease_id',
        'piece',
        'type_piece',
        'hawb',
        'dialing_id',
        'observations',
        'images',
        'qualification'
    ];

    protected $casts = [
        'disease_id' => 'array',
        'images' => 'array'
    ];

    public function return_report(): BelongsTo
    {
        return $this->belongsTo(ReturnReport::class, 'return_report_id');
    }

    public function returnReportItems(): BelongsToMany
    {
        return $this->belongsToMany(ReturnReport::class);
    }

    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }

    public function variety(): BelongsTo
    {
        return $this->belongsTo(Variety::class);
    }

    public function diseases(): BelongsToMany
    {
        return $this->belongsToMany(Disease::class, 'return_report_item_diseases')->withTimestamps();
    }

    public function returnReportItemDisease(): HasMany
    {
        return $this->hasMany(ReturnReportItemDisease::class);
    }

    public function dialing(): BelongsTo
    {
        return $this->belongsTo(Dialing::class);
    }
}
