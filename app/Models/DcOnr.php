<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DcOnr extends Model
{
    use HasFactory;
    protected $table = "dc_o_nr";
    protected $primaryKey = 'dconr_id'; 
    const CREATED_AT = 'dconr_created_on';
    const UPDATED_AT = 'dconr_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dconr_created_by = Auth::user()->emp_id;
            $model->dconr_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dconr_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"dconr_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"dconr_party_id");
    }
    public function items(){
        return $this->hasMany(DcOnrItem::class,"dconri_dconr_id");
    }
    
    public static function fetch()
    {
        return self::where('dconr_comp_id', Auth::user()->emp_comp_id)
                    ->where('dconr_status', 'ok');
    }
}
