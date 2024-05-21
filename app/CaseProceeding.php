<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseProceeding extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'updated_order_date' => 'datetime',
        'updated_next_date' => 'datetime',
    ];
    public function bills(){
        return $this->hasMany(Bill::class,'cpl_id');
    }
    public function bill(){
        return $this->hasOne(Bill::class,'cpl_id');
    }
    public function cases(){
        return $this->belongsTo(Cases::class,'cases_id');
    }
    public function status(){
        return $this->belongsTo(CplStatus::class,'updated_case_status_id');
    }
    public function fixed_for(){
        return $this->belongsTo(FixedFor::class,'updated_fixed_for_id');
    }
    public function next_fixed_for(){
        return $this->belongsTo(FixedFor::class,'updated_index_fixed_for_id');
    }
    public function proceeding(){
        return $this->belongsTo(CourtProceeding::class,'court_proceedings_id');
    }
    public function order(){
        return $this->belongsTo(CourtOrder::class,'updated_court_order_id');
    }
    public function note(){
        return $this->belongsTo(DayNote::class,'updated_day_notes_id');
    }
    public function presence(){
        return $this->belongsTo(NextDayPresence::class,'updated_next_day_presence_id');
    }
    public function lawyer(){
        return $this->belongsTo(Hr::class,'updated_engaged_advocate_id');
    }
    public function representative(){
        return $this->belongsTo(ClientRepresentative::class,'client_representative_party_name');
    }
}
