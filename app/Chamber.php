<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamber extends Model
{
    use HasFactory;
    
    protected $table = 'chambers';
    protected $guarded = [];
    
    public function hr()
    {
        return $this->belongsTo(Hr::class,'chamber_name_id');
    }
}
