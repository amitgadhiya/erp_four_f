<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DcIr extends Model
{
    use HasFactory;
    protected $table = "dc_i_r";
    protected $primaryKey = 'dcir_id'; 
    const CREATED_AT = 'dcir_created_on';
    const UPDATED_AT = 'dcir_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dcir_created_by = Auth::user()->emp_id;
            $model->dcir_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dcir_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"dcir_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"dcir_party_id");
    }
    public function items(){
        return $this->hasMany(DcIrItem::class,"dciri_dcir_id");
    }
    
    public static function fetch()
    {
        return self::where('dcir_comp_id', Auth::user()->emp_comp_id)
                    ->where('dcir_status', 'ok');
    }
}
