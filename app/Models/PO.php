<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PO extends Model
{
    use HasFactory;
    protected $table = 'po';
    protected $primaryKey = 'po_id';
    const CREATED_AT = 'po_created_on';
    const UPDATED_AT = 'po_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->po_created_by = Auth::user()->emp_id;
            $model->po_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->po_updated_by = Auth::user()->emp_id;
        });
    }
    public function company(){
        return $this->belongsTo(Company::class,"po_comp_id");
    }
    public function party(){
        return $this->belongsTo(Party::class,"po_party_id");
    }
    public function items(){
        return $this->hasMany(POItem::class,"poi_po_id");
    }
    
    public static function fetch()
    {
        return self::where('po_comp_id', Auth::user()->emp_comp_id)
                    ->where('po_status', 'ok');
    }
}
