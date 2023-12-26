<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        // Add more fillable fields as needed
    ];

    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }
}
