<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <h1>GreenImpact</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('calculator') }}">Calculadora</a></li>
                <li>|</li>
                <li><a href="{{ route('register') }}">Registro</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- Sección de registro -->
    <section class="signup">
        <h2>Registro de Cuenta</h2>
        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <label for="name">Nombre Completo:</label>
            <input type="text" id="name" name="name" required placeholder="Ingresa tu nombre completo">
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required placeholder="Crea una contraseña">
            
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirma tu contraseña">
            
            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
    </section>
</body>
</html>
