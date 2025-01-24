<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'Payment';
    protected $primaryKey = 'idPayment';
    protected $fillable = ['idPayment', 'idVisa', 'amount', 'paymentStatus', 'paymentDate'];

    // Relasi ke VisaApplicant
    public function visaApplicant()
    {
        return $this->belongsTo(VisaApplicant::class, 'idVisa', 'idVisa');
    }
}