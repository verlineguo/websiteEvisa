<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'employee'; 
    protected $primaryKey = 'idEmp'; 
    protected $fillable = [
        'idEmp', 'name', 'username', 'password', 'role', 'dob', 'phoneNo', 'emailAddress', 'address', 'gender'
    ];  
    protected $guard = 'employee';  
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->password; 
    }

    public function role() 
    {
        return $this->belongsTo(Role::class, 'role', 'idRole');
    }

    public function isAdmin()
    {
        return $this->role && $this->role->roleName === 'admin';
    }

    public function isConsultant()
    {
        return $this->role && $this->role->roleName === 'consultant';
    }

    public function getAuthIdentifierName()
    {
        return 'username';
    }

}
