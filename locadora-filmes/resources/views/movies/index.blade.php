@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl py-4 border-b mb-6">Gerenciamento de Filmes</h1>

    <a href="{{ route('movies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
        Adicionar Novo Filme
    </a>

    <div class="mt-6">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Título</th>
                    <th class="py-2 px-4 border-b">Estoque</th>
                    <th class="py-2 px-4 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $movie->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $movie->stock }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('movies.edit', $movie->id) }}" 
                           class="text-blue-500 hover:text-blue-700 mr-2">
                            Editar
                        </a>
                        <form class="inline-block" action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection