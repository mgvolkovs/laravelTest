<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentConfiguration extends Model
{
    use HasFactory;

    protected $table = 'document_configuration';

    protected $fillable = ['document_name','field_seq','is_mandatory','field_type','field_name','document_id','select_values'];

    public $timestamps = false;

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
