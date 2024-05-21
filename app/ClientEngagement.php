<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientEngagement extends Model
{
    use HasFactory;
    
    protected $table = 'client_engagements';
    protected $guarded = [];
    
}