<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GateEntryItem extends Model
{
    use HasFactory;
    protected $table = "gate_entry_items";
    protected $primaryKey = 'gei_id'; 
    public $timestamps = false;
    public function gate_entery(){
        return $this->belongsTo(GateEntry::class,"gei_ge_id");
    }
    public function item(){
        return $this->belongsTo(Item::class,"gei_item_id");
    }
    public function tax(){
        return $this->belongsTo(Tax::class,"gei_tax_id");
    }
}
