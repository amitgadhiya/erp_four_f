<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GRNItem extends Model
{
    use HasFactory;
    protected $table = "grn_item";
    protected $primaryKey = 'grni_id';
    public $timestamps = false;
}
