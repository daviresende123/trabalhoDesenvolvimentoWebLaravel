@extends('layouts.app')

@section('title', 'Editar Filme')
@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Editar Filme</h1>
    
    <form method="POST" action="{{ route('movies.update', $movie) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Mesmo conteúdo do create.blade.php, mas com valores pré-preenchidos -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Título</label>
                <input type="text" name="title" value="{{ $movie->title }}" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <!-- Repetir para outros campos com value="{{ $movie->campo }}" -->

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Capa Atual</label>
            <img src="{{ asset('storage/' . $movie->cover_image) }}" 
                 alt="Capa do filme" 
                 class="w-32 h-48 object-cover mb-2">
            <input type="file" name="cover_image"
                   class="w-full px-3 py-2 border rounded-lg">
        </div>

        <button type="submit"
                class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300">
            Atualizar
        </button>
    </form>
</div>
@endsection