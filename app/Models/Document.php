<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'lease_id',
        'name',
        'path',
        'mime_type',
        'size',
    ];

    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }

    public function getUrlAttribute(): string
    {
        return \Storage::url($this->path);
    }
}
