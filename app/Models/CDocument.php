<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDocument extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'created_at', 'updated_at'];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function revisions()
    {
        return $this->hasMany(DocumentRevision::class, 'document_id');
    }

    public function users()
    {
        return $this->belongsToMany(CUser::class, 'c_users_documents', 'document_id', 'user_id');
    }
}
