<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductionWork extends Model
{
    use HasFactory;
    protected $table = 'production_work';
    protected $primaryKey = 'pw_id';
    const CREATED_AT = 'pw_created_on';
    const UPDATED_AT = 'pw_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->pw_created_by = Auth::user()->emp_id;
            $model->pw_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->pw_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"pw_comp_id");
    }
    public function project(){
        return $this->belongsTo(Project::class,"pw_pro_id");
    }
    public function catg(){
        return $this->belongsTo(WorkCatg::class,"pw_catg_id");
    }
    public function emp(){
        return $this->belongsTo(Emp::class,"pw_emp_id");
    }
    public static function fetch()
    {
        return self::where('pw_comp_id', Auth::user()->emp_comp_id)
                    ->where('pw_status', 'ok');
    }
}
