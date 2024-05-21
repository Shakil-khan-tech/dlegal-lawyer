<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function zoneName()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
