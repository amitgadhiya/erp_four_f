<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GRN extends Model
{
    use HasFactory;
    protected $table = "grn";
    protected $primaryKey = 'grn_id'; 
    const CREATED_AT = 'grn_created_on';
    const UPDATED_AT = 'grn_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->grn_created_by = Auth::user()->emp_id;
            $model->grn_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->grn_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"grn_comp_id");
    }
    public function gateEntry(){
        return $this->belongsTo(Party::class,"grn_ge_id");
    }
    public static function fetch()
    {
        return self::where('grn_comp_id', Auth::user()->emp_comp_id)
                    ->where('grn_status', 'ok');
    }
}
