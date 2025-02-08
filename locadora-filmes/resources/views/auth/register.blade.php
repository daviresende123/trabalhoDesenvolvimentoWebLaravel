@extends('layouts.app')

@section('title', 'Registro')
@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6 mt-10">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Registrar</h1>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Nome</label>
            <input type="text" name="name" required
                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">E-mail</label>
            <input type="email" name="email" required
                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Senha</label>
            <input type="password" name="password" required
                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" 
                class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
            Registrar
        </button>
    </form>
</div>
@endsection