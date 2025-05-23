<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primaryKey = 'client_id';
    const CREATED_AT = 'client_created_on';
    const UPDATED_AT = 'client_updated_on';
    public function company(){
        return $this->belongsTo(Company::class,"client_comp_id");
    }
    
    public static function fetch()
    {
        return self::where('client_comp_id', Auth::user()->emp_comp_id)
                    ->where('client_status', 'ok');
    }
    
}
