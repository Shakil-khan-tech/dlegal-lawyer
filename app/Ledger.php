<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = ['transaction_date'=>'datetime'];
    
    public function client()
    {
        return $this->belongsTo(Client::class,'clint_party_id');
    }
    public function ledgerhead()
    {
        return $this->belongsTo(LedgerHead::class,'ledger_head_id');
    }
    public function ledgersubhead()
    {
        return $this->belongsTo(LedgerSubHead::class,'ledger_sub_head_id');
    }
    public function cases()
    {
        return $this->belongsTo(Cases::class,'case_service_job_id');
    }
    public function bill()
    {
        return $this->belongsTo(Bill::class,'bill_no_id');
    }
    public function paymenttype()
    {
        return $this->belongsTo(PaymentType::class,'payment_type_id');
    }
    public function adjustmentreason()
    {
        return $this->belongsTo(Adjustmentreason::class,'adjustment_reason_id');
    }
}