<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WorkCatg extends Model
{
    use HasFactory;
    protected $table = 'work_catg';
    protected $primaryKey = 'wc_id';
    const CREATED_AT = 'wc_created_on';
    const UPDATED_AT = 'wc_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->wc_created_by = Auth::user()->emp_id;
            $model->wc_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->wc_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"wc_comp_id");
    }
    
    public static function fetch()
    {
        return self::where('wc_comp_id', Auth::user()->emp_comp_id)
                    ->where('wc_status', 'ok');
    }
}
