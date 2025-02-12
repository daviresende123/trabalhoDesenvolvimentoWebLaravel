<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registrar</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>Nome:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Senha:</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Confirmar Senha:</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Registrar</button>
    </form>
    
    <a href="{{ route('login') }}">Já tem conta? Faça login</a>
</body>
</html>