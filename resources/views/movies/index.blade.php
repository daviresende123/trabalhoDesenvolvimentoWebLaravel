<!DOCTYPE html>
<html>
<head>
    <title>Filmes Disponíveis</title>
</head>
<body>
    <h1>Filmes Disponíveis</h1>
    
    @if(auth()->check())
        <p>Bem-vindo, {{ auth()->user()->name }}</p>
        <a href="{{ route('rentals.my') }}">Meus Aluguéis</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Registrar</a>
    @endif

    <div style="margin-top: 20px;">
        @foreach($movies as $movie)
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <h3>{{ $movie->title }}</h3>
                <p>{{ $movie->description }}</p>
                @if(auth()->check())
                    <form action="{{ route('rentals.store', $movie) }}" method="POST">
                        @csrf
                        <button type="submit">Alugar</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>