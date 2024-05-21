<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function clientClass()
    {
        return $this->belongsTo(ClientClass::class, 'client_class_id');
    }
}
