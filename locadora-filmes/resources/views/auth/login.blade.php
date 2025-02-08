@extends('layouts.app')

@section('title', 'Login')
@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6 mt-10">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Login</h1>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

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
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Entrar
        </button>
    </form>
</div>
@endsection