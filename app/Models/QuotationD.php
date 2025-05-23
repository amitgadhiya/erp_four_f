<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationD extends Model
{
    use HasFactory;
    protected $table = "quotaion_ds";
    protected $primaryKey = 'qd_id'; 
    public $timestamps = false;

    public function quotation(){
        return $this->belongsTo(Quotation::class,"qd_qout_id");
    }
    public function tax(){
        return $this->belongsTo(Tax::class,"qd_tax_id");
    }
}
