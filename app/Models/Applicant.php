<?php

namespace App\Models;

<<<<<<< HEAD
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
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
>>>>>>> parent of 4cc3d70 (semua :))
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
