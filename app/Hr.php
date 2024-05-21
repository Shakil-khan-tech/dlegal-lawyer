<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr extends Model
{
    use HasFactory;
    protected $table = 'hrs';
    protected $guarded = [];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
