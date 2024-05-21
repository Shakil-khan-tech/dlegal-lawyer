<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $casts = [
        'bill_date' => 'datetime',
    ];

    public function cpl()
    {
        return $this->belongsTo(CaseProceeding::class,'cpl_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'bill_client_id');
    }
    public function cases()
    {
        return $this->belongsTo(Cases::class,'bill_case_service_id');
    }
    public function type()
    {
        return $this->belongsTo(BillType::class,'bill_type_id');
    }
    public function reference()
    {
        return $this->belongsTo(BillReference::class,'bill_reference_id');
    }
    public function ledgers()
    {
        return $this->hasMany(Ledger::class,'bill_no_id');
    }

}
