<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    // Listagem admin
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    // Formulário de criação
    public function create()
    {
        return view('movies.create');
    }

    // Salvar filme
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'genre' => 'required',
            'release_year' => 'required|integer',
            'rental_price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_image' => 'required|image|max:2048'
        ]);

        // Upload da imagem
        $path = $request->file('cover_image')->store('public/movies');
        $validated['cover_image'] = str_replace('public/', '', $path);

        Movie::create($validated);

        return redirect()->route('admin.movies.index')->with('success', 'Filme cadastrado!');
    }

    // Formulário de edição
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    // Atualizar filme
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'genre' => 'required',
            'release_year' => 'required|integer',
            'rental_price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_image' => 'sometimes|image|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            Storage::delete('public/' . $movie->cover_image);
            $path = $request->file('cover_image')->store('public/movies');
            $validated['cover_image'] = str_replace('public/', '', $path);
        }

        $movie->update($validated);

        return redirect()->route('admin.movies.index')->with('success', 'Filme atualizado!');
    }

    // Excluir filme
    public function destroy(Movie $movie)
    {
        Storage::delete('public/' . $movie->cover_image);
        $movie->delete();
        return back()->with('success', 'Filme excluído!');
    }
}