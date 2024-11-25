<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción Premium</title>
</head>
<body>
    <h2>Suscripción Premium</h2>

    <p>Accede a todas las funcionalidades premium de la calculadora de huella de carbono.</p>

    <form method="POST" action="{{ route('payment.process') }}">
        @csrf

        <!-- Nombre del titular -->
        <label for="card_name">Nombre del titular:</label>
        <input type="text" id="card_name" name="card_name" required><br><br>

        <!-- Número de tarjeta -->
        <label for="card_number">Número de tarjeta:</label>
        <input type="text" id="card_number" name="card_number" pattern="\d{16}" maxlength="16" required placeholder="1234 5678 1234 5678"><br><br>

        <!-- Fecha de expiración -->
        <label for="expiration_date">Fecha de expiración:</label>
        <input type="text" id="expiration_date" name="expiration_date" pattern="\d{2}/\d{2}" required placeholder="MM/YY"><br><br>

        <!-- Código de seguridad -->
        <label for="cvv">Código de seguridad (CVV):</label>
        <input type="text" id="cvv" name="cvv" pattern="\d{3}" maxlength="3" required placeholder="123"><br><br>

        <button type="submit">Pagar y Activar Premium</button>
    </form>

    <p><a href="{{ route('home') }}">Volver al inicio</a></p>
</body>
</html>
