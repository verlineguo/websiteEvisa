<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'Country'; 
    protected $primaryKey = 'idCountry'; 
    public $incrementing = false; 
    public $timestamps = false;
    protected $keyType = 'string'; 

    protected $fillable = [
        'idCountry',
        'countryName',
    ];

    public function visa() 
    {
        return $this->hasMany(Visa::class, 'idCountry');
    }
}
