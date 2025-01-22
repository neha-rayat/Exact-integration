<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeGoodsTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'exact_id',
        'project_name',
        'project_id',
        'employe_name',
        'employe_id',
        'product_name',
        'product_id',
        'date',
    ];
}
