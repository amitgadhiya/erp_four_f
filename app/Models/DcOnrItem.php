<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DcOnrItem extends Model
{
    use HasFactory;
    protected $table = "dc_o_nr_item";
    protected $primaryKey = 'dconri_id'; 
    const CREATED_AT = 'dconri_created_on';
    const UPDATED_AT = 'dconri_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dconri_created_by = Auth::user()->emp_id;
            $model->dconri_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dconri_updated_by = Auth::user()->emp_id;
        });
    }
    public function item(){
        return $this->belongsTo(Item::class,"dconri_item_id");
    }
    public function dc(){
        return $this->belongsTo(DcOnr::class,"dconri_dconr_id");
    }
    
    public static function fetch($id)
    {
        return self::where('dconri_dconr_id', $id)
                    ->where('dconri_status', 'ok');
    }
}
