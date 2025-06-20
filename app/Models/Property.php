<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'city',
        'state',
        'zip',
        'rent',
        'bedrooms',
        'bathrooms',
        'sqft',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function leases()
    {
        return $this->hasMany(Lease::class);
    }
}
