<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaApplicant extends Model
{
    protected $table = 'visa_applicant';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $primaryKey = 'idVisa';

    protected $fillable = [
        'idVisa',
        'idApplicant',
        'idFee',
        'dateOfArrival',
        'dateOfDeparture',
        'lengthOfStay',
        'prevCountry',
        'expDate',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'idApplicant', 'idApplicant');
    }

    public function visa()
    {
        return $this->belongsTo(Visa::class, 'idFee', 'idFee');
    }

    

    // public function payments()
    // {
    //     return $this->hasMany(Payment::class, 'idVisa', 'idVisa');
    // }
}
