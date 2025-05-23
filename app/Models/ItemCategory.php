<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ItemCategory extends Model
{
    use HasFactory;
    protected $table = 'item_category';
    protected $primaryKey = 'ic_id';
    const CREATED_AT = 'ic_created_on';
    const UPDATED_AT = 'ic_updated_on';
    public function company(){
        return $this->belongsTo(Company::class,"ic_comp_id");
    }
    
    public static function fetch()
    {
        return self::where('ic_comp_id', Auth::user()->emp_comp_id)
                    ->where('ic_status', 'ok');
    }
}
