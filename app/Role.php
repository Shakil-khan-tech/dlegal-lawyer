<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded=[];

    public function lawyer(){
        return $this->belongsTo(Lawyer::class);
    }
    public function hrs()
    {
        return $this->hasMany(Hr::class);
    }

}
