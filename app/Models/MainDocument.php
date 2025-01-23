<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainDocument extends Model
{
    protected $table = 'main_document'; 
    protected $primaryKey = 'documentNo'; 
    protected $fillable = [
        'documentNo', 'idApplicant', 'documentType', 'filePath', 'uploadedDate'
    ];    
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    public function docType() 
    {
        return $this->belongsTo(DocType::class, 'documentNo', 'idDoc');
    }
}
