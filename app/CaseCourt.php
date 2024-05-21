<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Count;

class CaseCourt extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function caseClass()
    {
        return $this->belongsTo(CaseClasses::class, 'case_class', 'id');
    }
    public function caseCategory()
    {
        return $this->belongsTo(CaseCategory::class, 'case_category_id', 'id');
    }
    public function districtName()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function allDistrict()
    {
        return $this->belongsTo(CaseCourt::class, 'dall_district', 'id');
    }
   
}
