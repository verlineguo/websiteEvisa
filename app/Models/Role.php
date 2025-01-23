<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'idRole';
    public $incrementing = false;
    protected $fillable = ['idRole', 'roleName'];

    public function Employee() 
    {
        return $this->hasMany(Employee::class, 'id_role');
    }
}
