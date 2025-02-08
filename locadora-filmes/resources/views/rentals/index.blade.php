@extends('layouts.app')

@section('title', 'Filmes Disponíveis')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Filmes para Alugar</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($movies as $movie)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <img src="{{ asset('storage/' . $movie->cover_image) }}" 
                 alt="{{ $movie->title }}" 
                 class="w-full h-64 object-cover">
            
            <div class="p-4">
                <h2 class="text-xl font-bold mb-2">{{ $movie->title }}</h2>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-blue-600 font-bold">R$ {{ number_format($movie->rental_price, 2, ',') }}</span>
                    <span class="bg-gray-200 px-3 py-1 rounded-full text-sm">
                        {{ $movie->stock }} disponíveis
                    </span>
                </div>

                @if($movie->available)
                <form method="POST" action="{{ route('rentals.store') }}">
                    @csrf
                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                    <button type="submit" 
                            class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                        Alugar Agora
                    </button>
                </form>
                @else
                <button class="w-full bg-gray-400 text-white py-2 rounded-lg cursor-not-allowed" disabled>
                    Indisponível
                </button>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection