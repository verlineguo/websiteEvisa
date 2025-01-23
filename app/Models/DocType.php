<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocType extends Model
{
    use HasFactory;

    protected $table = 'doc_type';
    protected $primaryKey = 'idDoc';
    public $timestamps = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'idDoc',
        'dType',
    ];

    public function mainDocuments()
    {
        return $this->hasMany(MainDocument::class, 'documentType', 'idDoc');
    }
    
}
