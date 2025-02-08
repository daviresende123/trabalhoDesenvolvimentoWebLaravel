<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'genre', 'release_year', 
        'rental_price', 'stock', 'cover_image'
    ];
    
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function getAvailableAttribute()
    {
        return $this->stock > 0;
    }
}
