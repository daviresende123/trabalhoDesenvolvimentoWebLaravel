<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'available'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}