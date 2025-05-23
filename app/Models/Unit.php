<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Unit extends Model
{
    use HasFactory;
    protected $table = "units";
    protected $primaryKey = 'unit_id'; 
    const CREATED_AT = 'unit_created_on';
    const UPDATED_AT = 'unit_updated_on';
    
    public function company(){
        return $this->belongsTo(Company::class,"unit_comp_id");
    }
    public static function fetch()
    {
        return self::where('unit_comp_id', Auth::user()->emp_comp_id)
                    ->where('unit_status', 'ok');
    }
}
