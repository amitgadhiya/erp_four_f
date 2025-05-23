<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Enquiry extends Model
{
    use HasFactory;
    protected $table = "enquirys";
    protected $primaryKey = 'enq_id'; 
    const CREATED_AT = 'enq_created_on';
    const UPDATED_AT = 'enq_updated_on';
    
    public function company(){
        return $this->belongsTo(Company::class,"enq_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"enq_party_id");
    }
    public function emp(){
        return $this->belongsTo(Emp::class,"enq_emp_id");
    }
    public static function fetch()
    {
        return self::where('enq_comp_id', Auth::user()->emp_comp_id)
                    ->where('enq_status', 'ok');
    }
    
}
