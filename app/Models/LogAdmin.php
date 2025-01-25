<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAdmin extends Model
{
    protected $table = 'log_admin';

    protected $fillable = [
        'id',
        'Pengguna',
        'Tanggal',
        'Keterangan',
    ];
}
