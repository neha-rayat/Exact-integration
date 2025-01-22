<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authrization extends Model
{
    use HasFactory;

    protected $fillable = [
        'auth_code',
        'refresh_token',
        'access_token',
        'token_type',
        'compnay',
    ];
}
