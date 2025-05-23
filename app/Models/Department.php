<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Department extends Model
{
    use HasFactory;
    protected $table = "depts";
    protected $primaryKey = 'dept_id'; 
    const CREATED_AT = 'dept_created_on';
    const UPDATED_AT = 'dept_updated_on';
    
    public function company(){
        return $this->belongsTo(Company::class,"dept_comp_id");
    }
    public static function fetch()
    {
        return self::where('dept_comp_id', Auth::user()->emp_comp_id)
                    ->where('dept_status', 'ok');
    }
}
