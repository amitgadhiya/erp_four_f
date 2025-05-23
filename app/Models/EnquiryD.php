<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryD extends Model
{
    use HasFactory;
    protected $table = "enq_details";
    protected $primaryKey = 'enqd_id'; 
    public $timestamps = false;
    
    public function enq(){
        return $this->belongsTo(Enquiry::class,"enqd_enq_id");
    }
    
}
