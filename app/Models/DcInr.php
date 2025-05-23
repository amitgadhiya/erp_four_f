<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DcInr extends Model
{
    use HasFactory;
    protected $table = "dc_i_nr";
    protected $primaryKey = 'dcinr_id'; 
    const CREATED_AT = 'dcinr_created_on';
    const UPDATED_AT = 'dcinr_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dcinr_created_by = Auth::user()->emp_id;
            $model->dcinr_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dcinr_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"dcinr_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"dcinr_party_id");
    }
    public function items(){
        return $this->hasMany(DcInrItem::class,"dcinri_dcinr_id");
    }
    
    public static function fetch()
    {
        return self::where('dcinr_comp_id', Auth::user()->emp_comp_id)
                    ->where('dcinr_status', 'ok');
    }
}
