<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Purchase extends Model
{
    use HasFactory;
    protected $table = "purchase";
    protected $primaryKey = 'purch_id'; 
    const CREATED_AT = 'purch_created_on';
    const UPDATED_AT = 'purch_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->purch_created_by = Auth::user()->emp_id;
            $model->purch_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->purch_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"purch_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"purch_party_id");
    }
    public function emp(){
        return $this->belongsTo(Emp::class,"purch_emp_id");
    }
    public static function fetch()
    {
        return self::where('purch_comp_id', Auth::user()->emp_comp_id)
                    ->where('purch_status', 'ok');
    }
}
