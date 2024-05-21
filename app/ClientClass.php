<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientClass extends Model
{
    use HasFactory;
    
    protected $table = 'client_classes';
    protected $guarded = [];
    
}