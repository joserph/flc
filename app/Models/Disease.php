<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disease extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type'
    ];

    public function return_report_items(): BelongsToMany
    {
        return $this->belongsToMany(ReturnReportItem::class, 'return_report_item_disease')->withTimestamps();
    }

    public function return_report_items_diseases(): HasMany
    {
        return $this->hasMany(ReturnReportItemDisease::class, 'disease_id');
    }
}
