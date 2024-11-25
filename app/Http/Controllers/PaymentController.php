<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Exception;

class PaymentController extends Controller
{
    // Mostrar el formulario de pago
    public function showPaymentForm()
    {
        return view('pagos');
    }

    // Procesar el pago y guardar los datos de la tarjeta
    public function processPayment(Request $request)
    {
        try {
            // Registrar el inicio del proceso
            Log::info('Iniciando el proceso de pago para el usuario', ['user_id' => Auth::id()]);

            // Validar los datos de la tarjeta de crédito
            $validated = $request->validate([
                'card_name' => 'required|string|max:255',
                'card_number' => 'required|digits:16',
                'expiration_date' => 'required|date_format:m/y',
                'cvv' => 'required|digits:3',
            ]);

            Log::info('Datos validados correctamente', ['validated_data' => $validated]);

            // Obtener los últimos 4 dígitos de la tarjeta
            $card_last_four = substr($validated['card_number'], -4);
            Log::info('Últimos 4 dígitos de la tarjeta', ['card_last_four' => $card_last_four]);

            // Simulando un token de pago, aquí debería ir la integración con el proveedor de pagos
            $payment_token = 'mock_payment_token_12345';  
            Log::info('Token de pago generado', ['payment_token' => $payment_token]);

            // Crear la suscripción en la base de datos
            $subscription = Subscription::create([
                'user_id' => Auth::id(),
                'card_last_four' => $card_last_four,
                'payment_token' => $payment_token,
                'is_active' => true,
            ]);
            Log::info('Suscripción creada correctamente', ['subscription_id' => $subscription->id]);

            // Actualizar el estado de 'is_premium' del usuario a true
            User::where('id', Auth::id())->update(['is_premium' => true]);
            Log::info('Usuario marcado como premium', ['user_id' => Auth::id()]);

            // Redirigir al usuario a la página de inicio con un mensaje de éxito
            return redirect()->route('home')->with('success', 'Suscripción activada exitosamente!');

        } catch (Exception $e) {
            // Capturar cualquier error y loguearlo
            Log::error('Error al procesar el pago', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Ocurrió un error al procesar la suscripción. Por favor, intente nuevamente.'])->withInput();
        }
    }
}
