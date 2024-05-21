<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'setup_districts';
    use HasFactory;
    protected $guarded = [];

    public function divisionName()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
}
