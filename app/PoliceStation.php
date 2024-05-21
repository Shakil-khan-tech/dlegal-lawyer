<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceStation extends Model
{
    protected $table = 'setup_policestations';
    use HasFactory;
    protected $guarded = [];

}
