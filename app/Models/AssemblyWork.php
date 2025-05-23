<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AssemblyWork extends Model
{
    use HasFactory;
    protected $table = 'assembly_work';
    protected $primaryKey = 'aw_id';
    const CREATED_AT = 'aw_created_on';
    const UPDATED_AT = 'aw_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->aw_created_by = Auth::user()->emp_id;
            $model->aw_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->aw_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"aw_comp_id");
    }
    public function project(){
        return $this->belongsTo(Project::class,"aw_pro_id");
    }
    public function catg(){
        return $this->belongsTo(WorkCatg::class,"aw_catg_id");
    }
    public function emp(){
        return $this->belongsTo(Emp::class,"aw_emp_id");
    }
    public static function fetch()
    {
        return self::where('aw_comp_id', Auth::user()->emp_comp_id)
                    ->where('aw_status', 'ok');
    }
}
