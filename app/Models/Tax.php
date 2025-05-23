<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tax extends Model
{
    use HasFactory;
    protected $table = "taxs";
    protected $primaryKey = 'tax_id'; 
    const CREATED_AT = 'tax_created_on';
    const UPDATED_AT = 'tax_updated_on';
    
    public function company(){
        return $this->belongsTo(Company::class,"tax_comp_id");
    }
    public static function fetch()
    {
        return self::where('tax_comp_id', Auth::user()->emp_comp_id)
                    ->where('tax_status', 'ok');
    }
}
