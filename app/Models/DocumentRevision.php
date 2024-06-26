<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRevision extends Model
{
    use HasFactory;

    protected $fillable = ['document_id', 'content'];

    public function document()
    {
        return $this->belongsTo(CDocument::class, 'document_id');
    }
}
