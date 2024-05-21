<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseCategory extends Model
{
    use HasFactory;
    protected $table = 'case_category';
    protected $guarded = [];

    public function caseClass()
    {
        return $this->belongsTo(CaseClasses::class,'case_class');
    }
}
