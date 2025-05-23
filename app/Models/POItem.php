<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class POItem extends Model
{
    use HasFactory;
    protected $table = 'po_item';
    protected $primaryKey = 'poi_id';
    const CREATED_AT = 'poi_created_on';
    const UPDATED_AT = 'poi_updated_on';
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->poi_created_by = Auth::user()->emp_id;
            $model->poi_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->poi_updated_by = Auth::user()->emp_id;
        });
    }
    public static function fetch($id)
    {
        return self::where('poi_po_id', $id)
                    ->where('poi_status', 'ok');
    }
    public function po(){
        return $this->belongsTo(PO::class,"poi_po_id");
    }
    public function item(){
        return $this->belongsTo(Item::class,"poi_item_id");
    }
}
