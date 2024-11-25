<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Inicio</a></li>
            
            @auth
                <li><a href="{{ route('calculator') }}">Calculadora de Huella de Carbono</a></li>
                
                @if(Auth::user()->is_premium)
                    <li><a href="{{ route('subscription') }}">Mi Suscripción</a></li>
                @else
                    <li><a href="{{ route('subscription') }}">Hacerme Premium</a></li>
                @endif

                <!-- Formulario de logout -->
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            @else
                <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                <li><a href="{{ route('register') }}">Registrarse</a></li>
            @endauth
        </ul>
    </nav>

    <!-- Contenido de la página -->
    <h1>Bienvenido a nuestra página</h1>

    @auth
        <p>Bienvenido, {{ Auth::user()->name }}!</p>
    @else
        <p>Por favor, inicia sesión o regístrate para acceder a las funciones premium.</p>
    @endauth

</body>
</html>
