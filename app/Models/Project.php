<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $primaryKey = 'pro_id'; 
    const CREATED_AT = 'pro_created_on';
    const UPDATED_AT = 'pro_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->pro_created_by = Auth::user()->emp_id;
            $model->pro_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->pro_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"pro_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"pro_party_id");
    }
    public static function fetch()
    {
        return self::where('pro_comp_id', Auth::user()->emp_comp_id)
                    ->where('pro_status', 'ok');
    }
}
