<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenImpact</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <!-- Navbar -->
    <header>
        <h1>GreenImpact</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('calculator') }}">Calculadora</a></li>
                <li>|</li>
                @auth
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('register') }}">Registro</a></li>
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- Contenido -->
    <main>
        @auth
            <section class="hero">
                <h2>Bienvenido de nuevo, {{ Auth::user()->name }}</h2>
                <p>Gracias por ser parte de GreenImpact. Juntos trabajamos para construir un futuro más sostenible y reducir nuestra huella de carbono. Como miembro registrado, tienes acceso exclusivo a nuestra calculadora personalizada y a consejos prácticos para adoptar un estilo de vida ecológico.</p>
                <p>¿Sabías que el desarrollo y entrenamiento de tecnologías como la inteligencia artificial generan una considerable cantidad de emisiones de CO₂? Estudios recientes indican que entrenar un modelo de IA avanzado puede generar tanto CO₂ como cinco automóviles a gasolina durante toda su vida útil. Por eso, es esencial que sigamos buscando formas de optimizar el uso energético en el sector tecnológico.</p>
                <p>Al utilizar herramientas como GreenImpact, no solo puedes medir tu propia huella de carbono, sino también aprender cómo reducir el impacto ambiental en áreas tecnológicas y del día a día.</p>
                <a href="{{ route('calculator') }}" class="btn">Calcula tu Huella de Carbono</a>
            </section>
        @else
            <section class="hero">
                <h2>Bienvenido a GreenImpact</h2>
                <p>Transformando el futuro con soluciones sostenibles. Únete a nuestra comunidad y accede a herramientas que te ayudarán a medir y reducir tu impacto en el medio ambiente.</p>
                <p>La tecnología avanza a pasos agigantados, pero también lo hace su impacto ambiental. Ayúdanos a crear conciencia sobre cómo un uso responsable de la tecnología, incluida la inteligencia artificial, puede mitigar el cambio climático.</p>
                <a href="{{ route('calculator') }}" class="btn">Calcula tu Huella de Carbono</a>
            </section>
        @endauth
    </main>
</body>
</html>
