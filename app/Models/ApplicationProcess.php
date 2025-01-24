<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationProcess extends Model
{
    protected $table = 'application_process';
    public $incrementing = false; 
    public $timestamps = false;
    protected $keyType = 'string'; 
    protected $primaryKey = 'noAppProcess';

    protected $fillable = [
        'noAppProcess',
        'idVisa',
        'startDate',
        'endDate',
        'idStat'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'idStat', 'idStat'); // Relasi ke tabel statuses
    }

}