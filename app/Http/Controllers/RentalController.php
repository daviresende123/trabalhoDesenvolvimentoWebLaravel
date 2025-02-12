<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Movie;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function store(Request $request, Movie $movie)
    {
        $movie->update(['available' => false]);
        
        Rental::create([
            'user_id' => auth()->id(),
            'movie_id' => $movie->id,
            'rental_date' => now()
        ]);

        return redirect()->route('movies.index');
    }

    public function myRentals()
    {
        $rentals = Rental::where('user_id', auth()->id())
            ->whereNull('return_date')
            ->with('movie')
            ->get();
            
        return view('rentals.index', compact('rentals'));
    }
}