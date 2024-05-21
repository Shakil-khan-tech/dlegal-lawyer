<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function thanaName()
    {
        return $this->belongsTo(Thana::class, 'thana_id');
    }
}
