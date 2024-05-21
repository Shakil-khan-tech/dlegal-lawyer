<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseMatter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function caseCategory()
    {
        return $this->belongsTo(CaseCategory::class, 'case_category_id');
    }
}
