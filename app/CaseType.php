<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function caseClass()
    {
        return $this->belongsTo(CaseClasses::class, 'case_class');
    }
    public function caseCategory()
    {
        return $this->belongsTo(CaseCategory::class, 'case_category_id');
    }
}
