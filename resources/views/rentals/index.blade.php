<!DOCTYPE html>
<html>
<head>
    <title>Meus Aluguéis</title>
</head>
<body>
    <h1>Meus Aluguéis</h1>
    <a href="{{ route('movies.index') }}">Voltar para Filmes</a>

    <div style="margin-top: 20px;">
        @foreach($rentals as $rental)
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <h3>{{ $rental->movie->title }}</h3>
                <p>Alugado em: {{ $rental->rental_date }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>