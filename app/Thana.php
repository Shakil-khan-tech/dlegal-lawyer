<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $table = 'setup_thanas';
    use HasFactory;
    protected $guarded = [];
    
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
