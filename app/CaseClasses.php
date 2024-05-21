<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseClasses extends Model
{
    protected $table = 'case_classes';
    protected $guarded = [];
    use HasFactory;
}
