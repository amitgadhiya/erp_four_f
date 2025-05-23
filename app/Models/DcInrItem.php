<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DcInrItem extends Model
{
    use HasFactory;
    protected $table = "dc_i_nr_item";
    protected $primaryKey = 'dcinri_id'; 
    const CREATED_AT = 'dcinri_created_on';
    const UPDATED_AT = 'dcinri_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dcinri_created_by = Auth::user()->emp_id;
            $model->dcinri_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dcinri_updated_by = Auth::user()->emp_id;
        });
    }
    public function item(){
        return $this->belongsTo(Item::class,"dcinri_item_id");
    }
    public function dc(){
        return $this->belongsTo(DcInr::class,"dcinri_dcinr_id");
    }
    
    public static function fetch($id)
    {
        return self::where('dcinri_dcinr_id', $id)
                    ->where('dcinri_status', 'ok');
    }
}
