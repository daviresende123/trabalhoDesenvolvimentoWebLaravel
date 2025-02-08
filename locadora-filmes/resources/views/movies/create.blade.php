@extends('layouts.app')

@section('title', 'Novo Filme')
@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Cadastrar Novo Filme</h1>
    
    <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Título</label>
                <input type="text" name="title" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Gênero</label>
                <input type="text" name="genre" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Ano de Lançamento</label>
                <input type="number" name="release_year" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Preço de Aluguel (R$)</label>
                <input type="number" step="0.01" name="rental_price" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Estoque</label>
                <input type="number" name="stock" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Capa do Filme</label>
                <input type="file" name="cover_image" required
                       class="w-full px-3 py-2 border rounded-lg">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Descrição</label>
            <textarea name="description" required rows="4"
                      class="w-full px-3 py-2 border rounded-lg"></textarea>
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Cadastrar
        </button>
    </form>
</div>
@endsection