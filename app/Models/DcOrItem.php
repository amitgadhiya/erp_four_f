<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DcOrItem extends Model
{
    use HasFactory;
    protected $table = "dc_o_r_item";
    protected $primaryKey = 'dcori_id'; 
    const CREATED_AT = 'dcori_created_on';
    const UPDATED_AT = 'dcori_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dcori_created_by = Auth::user()->emp_id;
            $model->dcori_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dcori_updated_by = Auth::user()->emp_id;
        });
    }
    public function item(){
        return $this->belongsTo(Item::class,"dcori_item_id");
    }
    public function dc(){
        return $this->belongsTo(DcOr::class,"dcori_dcor_id");
    }
    
    public static function fetch($id)
    {
        return self::where('dcori_dcor_id', $id)
                    ->where('dcori_status', 'ok');
    }
}
