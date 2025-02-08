<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <a href="/" class="text-xl font-bold">CineLocadora</a>
            <div class="space-x-4">
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.movies.index') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Sair</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Registrar</a>
            @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>