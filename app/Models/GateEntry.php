<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GateEntry extends Model
{
    use HasFactory;
    protected $table = "gate_entry";
    protected $primaryKey = 'ge_id'; 
    const CREATED_AT = 'ge_created_on';
    const UPDATED_AT = 'ge_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->ge_created_by = Auth::user()->emp_id;
            $model->ge_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->ge_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"ge_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"ge_party_id");
    }
    public static function fetch()
    {
        return self::where('ge_comp_id', Auth::user()->emp_comp_id)
                    ->where('ge_status', 'ok');
    }
}
