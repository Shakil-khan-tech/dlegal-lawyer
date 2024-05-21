<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseClient extends Model
{
    protected $table = 'cases_clients';
    protected $guarded = [];
    use HasFactory;
}
