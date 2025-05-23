<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Party extends Model
{
    use HasFactory;
    protected $table = 'partys';
    protected $primaryKey = 'party_id';
    const CREATED_AT = 'party_created_on';
    const UPDATED_AT = 'party_updated_on';
    public function company(){
        return $this->belongsTo(Company::class,"party_comp_id");
    }
    
    public static function fetch()
    {
        return self::where('party_comp_id', Auth::user()->emp_comp_id)
                    ->where('party_status', 'ok');
    }
    public static function fetch_client()
    {
        return self::where('party_comp_id', Auth::user()->emp_comp_id)
        ->where("party_client",true)
                    ->where('party_status', 'ok');
    }
    public static function fetch_vender()
    {
        return self::where('party_comp_id', Auth::user()->emp_comp_id)
        ->where("party_vender",true)
                    ->where('party_status', 'ok');
    }
}
