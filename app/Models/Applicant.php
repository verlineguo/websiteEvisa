<?php

namespace App\Models;

<<<<<<< Updated upstream
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Authenticatable
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
>>>>>>> Stashed changes
{
    use HasFactory;

    protected $table = 'applicant';
    public $incrementing = false; 
    public $timestamps = false;
    protected $keyType = 'string'; 
    protected $primaryKey = 'idApplicant';

    protected $fillable = [
        'idApplicant',
        'name',
        'username',
        'password',
        'dob',
        'phoneNo',
        'emailAddress',
        'address',
        'motherName',
        'gender',
        'profession',
    ];
}
