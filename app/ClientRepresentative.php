<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRepresentative extends Model
{
    use HasFactory;
    protected $table = "client_representetives";
    protected $guarded = [];
}
