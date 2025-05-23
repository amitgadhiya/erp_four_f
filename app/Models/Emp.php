<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Emp extends Authenticatable
{
    use HasFactory;
    protected $table = "emps";
    protected $primaryKey = 'emp_id'; 
    const CREATED_AT = 'emp_created_on';
    const UPDATED_AT = 'emp_updated_on';
    protected $fillable = [
        'emp_name',
        'emp_code',
        'emp_mobile',
        'emp_email',
        'emp_password',
        'emp_comp_id',
        'emp_dept_id',
        'emp_last_login',
        'emp_status'
    ];

    protected $hidden = [
        'emp_password',
    ];
    public function company(){
        return $this->belongsTo(Company::class,"emp_comp_id");
    }
    public function dept(){
        return $this->belongsTo(Department::class,"emp_dept_id");
    }
    public static function fetch()
    {
        return self::where('emp_comp_id', Auth::user()->emp_comp_id)
                    ->where('emp_status', 'ok');
    }
    public function getAuthPassword()
    {
        return $this->emp_password; // Tell Laravel to use 'emp_password' instead of 'password'
    }
}
