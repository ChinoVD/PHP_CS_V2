<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Huella de Carbono</title>
</head>
<body>
    <h2>Calculadora de Huella de Carbono</h2>
    
    <form action="{{ route('calculator') }}" method="POST">
        @csrf
        <label for="ai_type">Tipo de AI:</label>
        <input type="text" id="ai_type" name="ai_type" required><br>

        <label for="energy_consumed">Energía consumida (kWh):</label>
        <input type="number" id="energy_consumed" name="energy_consumed" required><br>

        <label for="usage_time">Tiempo de uso (horas):</label>
        <input type="number" id="usage_time" name="usage_time" required><br>

        <button type="submit">Calcular</button>
    </form>

    <p><a href="{{ route('home') }}">Volver al inicio</a></p>
</body>
</html>
