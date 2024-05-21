<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function clientCategory()
    {
        return $this->belongsTo(ClientCategory::class, 'client_category_id');
    }
}
