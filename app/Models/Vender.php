<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Vender extends Model
{
    use HasFactory;
    protected $table = 'venders';
    protected $primaryKey = 'vender_id';
    const CREATED_AT = 'vender_created_on';
    const UPDATED_AT = 'vender_updated_on';
    public function company(){
        return $this->belongsTo(Company::class,"vender_comp_id");
    }
    
    public static function fetch()
    {
        return self::where('vender_comp_id', Auth::user()->emp_comp_id)
                    ->where('vender_status', 'ok');
    }
}
