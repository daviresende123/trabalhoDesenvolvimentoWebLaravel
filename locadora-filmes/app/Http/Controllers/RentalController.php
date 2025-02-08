<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    // Listagem usuário
    public function index()
    {
        $movies = Movie::where('stock', '>', 0)->get();
        return view('rentals.index', compact('movies'));
    }

    // Alugar filme
    public function store(Request $request)
    {
        $request->validate(['movie_id' => 'required|exists:movies,id']);
        
        DB::transaction(function () use ($request) {
            Rental::create([
                'user_id' => auth()->id(),
                'movie_id' => $request->movie_id,
                'rental_date' => now()
            ]);

            Movie::find($request->movie_id)->decrement('stock');
        });

        return redirect()->route('home')->with('success', 'Filme alugado!');
    }

    // Devolver filme
    public function update(Rental $rental)
    {
        DB::transaction(function () use ($rental) {
            $rental->update(['return_date' => now()]);
            $rental->movie()->increment('stock');
        });

        return back()->with('success', 'Filme devolvido!');
    }
}