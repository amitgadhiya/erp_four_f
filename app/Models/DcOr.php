<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DcOr extends Model
{
    use HasFactory;
    protected $table = "dc_o_r";
    protected $primaryKey = 'dcor_id'; 
    const CREATED_AT = 'dcor_created_on';
    const UPDATED_AT = 'dcor_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dcor_created_by = Auth::user()->emp_id;
            $model->dcor_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dcor_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"dcor_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"dcor_party_id");
    }
    public function items(){
        return $this->hasMany(DcOrItem::class,"dcori_dcor_id");
    }
    
    public static function fetch()
    {
        return self::where('dcor_comp_id', Auth::user()->emp_comp_id)
                    ->where('dcor_status', 'ok');
    }
}
