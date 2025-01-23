<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationProcess extends Model
{
    protected $table = 'ApplicantProcess';
    protected $timestamps = false;

    protected $fillable = [
        'idApplicant',
        'idVisaApplicant',
        'idStat'
    ];

}