<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quotation extends Model
{
    use HasFactory;
    protected $table = "quotations";
    protected $primaryKey = 'quot_id'; 
    const CREATED_AT = 'quot_created_on';
    const UPDATED_AT = 'quot_updated_on';
    
    public function company(){
        return $this->belongsTo(Company::class,"quot_comp_id");
    }
    public function enq(){
        return $this->belongsTo(Enquiry::class,"quot_enq_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"quot_party_id");
    }
    public function emp(){
        return $this->belongsTo(Emp::class,"quot_emp_id");
    }
    public static function fetch()
    {
        return self::where('quot_comp_id', Auth::user()->emp_comp_id)
                    ->where('quot_status', 'ok');
    }
    public function followUps()
    {
        return $this->hasMany(Followup::class,"fu_quot_id");
    }
    public function nextFollowUp()
    {
        return $this->hasOne(Followup::class,"fu_quot_id")
                ->where('fu_do_date', '>=', now())
                ->orderBy('fu_do_date');
    }   
    protected function quotDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
        );
    }
    public function items()
    {
        return $this->hasMany(QuotationD::class, 'qd_qout_id');
    }
    
}
