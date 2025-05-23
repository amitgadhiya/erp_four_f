<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProjectElement extends Model
{
    use HasFactory;
    protected $table = 'elements';
    protected $primaryKey = 'ele_id';
    const CREATED_AT = 'ele_created_on';
    const UPDATED_AT = 'ele_updated_on';

    protected $fillable = [
        'ele_pro_id',
        'ele_item_id',
        'ele_type_id',
        'ele_name',
        'ele_code',
        'ele_qty',
        'ele_prod_status',
        'ele_order_status',
        'ele_status',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->ele_created_by = Auth::user()->emp_id;
            $model->ele_updated_by = Auth::user()->emp_id;
        });

        static::updating(function ($model) {
            $model->ele_updated_by = Auth::user()->emp_id;
        });
    }

    // Relationships

    public function project()
    {
        return $this->belongsTo(Project::class, 'ele_pro_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'ele_item_id');
    }
    public static function fetch($id)
    {
        return self::where('ele_pro_id',$id)
                    ->where('ele_status', 'ok');
    }

    

    
}
