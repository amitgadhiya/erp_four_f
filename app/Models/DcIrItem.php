<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DcIrItem extends Model
{
    use HasFactory;
    protected $table = "dc_i_r_item";
    protected $primaryKey = 'dciri_id'; 
    const CREATED_AT = 'dciri_created_on';
    const UPDATED_AT = 'dciri_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dciri_created_by = Auth::user()->emp_id;
            $model->dciri_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dciri_updated_by = Auth::user()->emp_id;
        });
    }
    public function item(){
        return $this->belongsTo(Item::class,"dciri_item_id");
    }
    public function dc(){
        return $this->belongsTo(DcIr::class,"dciri_dcir_id");
    }
    
    public static function fetch($id)
    {
        return self::where('dciri_dcir_id', $id)
                    ->where('dciri_status', 'ok');
    }
}
