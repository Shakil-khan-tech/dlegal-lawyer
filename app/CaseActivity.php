<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseActivity extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'activity_date' => 'datetime',
    ];
}
