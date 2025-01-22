<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExactErrors extends Model
{
    use HasFactory;
    protected $fillable = [
        'quaderno_id',
    ];

}
