<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('login');  // Asegúrate de tener la vista 'login.blade.php'
    }

    // Procesar el inicio de sesión de usuario
    public function login(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password']
        ])) {
            // Si la autenticación tiene éxito, redirige al usuario a la página principal
            return redirect()->route('home')->with('success', 'Inicio de sesión exitoso');
        }

        // Si falla la autenticación, redirige con error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    // Mostrar formulario de registro
    public function showRegistrationForm()
    {
        return view('registro');  // Asegúrate de tener la vista 'register.blade.php'
    }

    // Procesar el registro de usuario
    public function register(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_premium' => false, // Por defecto, el usuario no será premium
        ]);

        // Iniciar sesión automáticamente después del registro
        Auth::login($user); // Aquí se usa el facade Auth correctamente

        // Redirigir al usuario a la página de inicio
        return redirect()->route('home')->with('success', 'Registro exitoso!');
    }

    // Mostrar página de suscripción
    public function showSubscriptionPage()
    {
        return view('pagos');  // Asegúrate de que la vista 'pagos.blade.php' esté en resources/views
    }

    // Mostrar calculadora
    public function showCalculator()
    {
        // Asegúrate de que 'calculadora' sea el nombre correcto de tu vista
        return view('calculadora');
    }
}
