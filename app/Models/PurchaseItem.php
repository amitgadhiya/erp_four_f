<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;
    protected $table = "purchase_item";
    protected $primaryKey = 'pi_id'; 
    public $timestamps = false;
    public function purhc(){
        return $this->belongsTo(Purchase::class,"pi_purch_id");
    }
    public function item(){
        return $this->belongsTo(Item::class,"pi_item_id");
    }
    public function tax(){
        return $this->belongsTo(Tax::class,"pi_tax_id");
    }
}
