<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'client_id',
        'observations'
    ];
}
