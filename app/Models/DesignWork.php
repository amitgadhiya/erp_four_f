<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DesignWork extends Model
{
    use HasFactory;
    protected $table = 'design_work';
    protected $primaryKey = 'dw_id';
    const CREATED_AT = 'dw_created_on';
    const UPDATED_AT = 'dw_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->dw_created_by = Auth::user()->emp_id;
            $model->dw_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->dw_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"dw_comp_id");
    }
    public function project(){
        return $this->belongsTo(Project::class,"dw_pro_id");
    }
    public function enq(){
        return $this->belongsTo(Enquiry::class,"dw_enq_id");
    }
    public function catg(){
        return $this->belongsTo(WorkCatg::class,"dw_catg_id");
    }
    public function emp(){
        return $this->belongsTo(Emp::class,"dw_emp_id");
    }
    public static function fetch()
    {
        return self::where('dw_comp_id', Auth::user()->emp_comp_id)
                    ->where('dw_status', 'ok');
    }
}
