<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'postdate',
        'page',
        'method',
        'ip',
        'request_body',
        'errors'
    ];

    protected $casts = [
        'request_body' => 'array',
        'errors' => 'array',
    ];
}
