<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Followup extends Model
{
    use HasFactory;
    protected $table = "followups";
    protected $primaryKey = 'fu_id'; 
    public $timestamps = false;

    public function quot(){
        return $this->belongsTo(Quotation::class,"fu_quot_id");
    }
    public function emp(){
        return $this->belongsTo(Emp::class,"fu_emp_id");
    }
    public static function fetch($id)
    {
        return self::where('fu_quot_id', $id);
    }
    protected function fuDoDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
        );
    }
    protected function fuDoneDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'),
        );
    }
}
