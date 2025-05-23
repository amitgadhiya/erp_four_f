<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $primaryKey = 'item_id';
    const CREATED_AT = 'item_created_on';
    const UPDATED_AT = 'item_updated_on';
    public function company(){
        return $this->belongsTo(Company::class,"item_comp_id");
    }
    public function catg(){
        return $this->belongsTo(ItemCategory::class,"item_catg_id");
    }
    public function unit(){
        return $this->belongsTo(Unit::class,"item_unit_id");
    }
    public function tax(){
        return $this->belongsTo(tax::class,"item_tax_id");
    }
    
    public static function fetch()
    {
        return self::where('item_comp_id', Auth::user()->emp_comp_id)
                    ->where('item_status', 'ok');
    }
}
