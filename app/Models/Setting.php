<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    protected $primaryKey = 'set_id'; 
    const CREATED_AT = 'set_created_on';
    const UPDATED_AT = 'set_updated_on';
    
    public function company(){
        return $this->belongsTo(Company::class,"set_comp_id");
    }
    public static function fetch()
    {
        return self::where('set_comp_id', Auth::user()->emp_comp_id);
                    //->where('set_status', 'ok');
    }
}
