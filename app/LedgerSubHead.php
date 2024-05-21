<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerSubHead extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function ledgerHead()
    {
        return $this->belongsTo(LedgerHead::class, 'ledger_head_id');
    }
}
