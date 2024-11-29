<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <h1>GreenImpact</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li>|</li>
                <li><a href="{{ route('register') }}">Registro</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- Sección de inicio de sesión -->
    <section class="login">
        <h2>Iniciar sesión</h2>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
            
            <button type="submit">Iniciar sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
    </section>
</body>
</html>
