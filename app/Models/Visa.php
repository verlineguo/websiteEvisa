<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $table = 'visa'; 
    protected $primaryKey = 'idFee'; 
    protected $fillable = [
        'idFee', 'jenisVisa', 'idCountry', 'fee'
    ];    
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    public function country() 
    {
        return $this->belongsTo(country::class, 'idCountry', 'idCountry');
    }
}


