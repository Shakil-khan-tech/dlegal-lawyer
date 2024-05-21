<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseSubsequent extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $casts = [
        'case_filing_date' => 'datetime',
    ];
    
    
    public function section()
    {
        return $this->belongsTo(CaseSection::class, 'section_id', 'id');
    }
    
    public function court()
    {
        return $this->belongsTo(CaseCourt::class, 'court_id', 'id');
    }
    
    public function caseTitle()
    {
        return $this->belongsTo(CaseTitle::class,'case_infos_case_title_id');
    }
    public function law()
    {
        return $this->belongsTo(CaseLaw::class,'law_id');
    }
}
