<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Machine extends Model
{
    use HasFactory;
    protected $table = "machines";
    protected $primaryKey = 'mach_id'; 
    const CREATED_AT = 'mach_created_on';
    const UPDATED_AT = 'mach_updated_on';
    
    public function company(){
        return $this->belongsTo(Company::class,"mach_comp_id");
    }
    public static function fetch()
    {
        return self::where('mach_comp_id', Auth::user()->emp_comp_id)
                    ->where('mach_status', 'ok');
    }
}
