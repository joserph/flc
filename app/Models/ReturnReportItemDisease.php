<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReturnReportItemDisease extends Model
{
    use HasFactory;

    protected $fillable = ['return_report_item_id', 'disease_id', 'percentage'];

    public function returnReportItem(): BelongsTo
    {
        return $this->belongsTo(ReturnReportItem::class);
    }
 
    public function disease(): BelongsTo
    {
        return $this->belongsTo(Disease::class);
    }
}
