<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('registro'); // Vista donde está el formulario
    }

    // Procesar el registro de usuario
    public function register(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' verifica que los campos coincidan
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Encriptar la contraseña
            'is_premium' => false, // Por defecto, no será premium
        ]);

        // Iniciar sesión automáticamente después del registro
        Auth::login($user); // Aquí se usa el facade Auth correctamente

        // Redirigir al usuario al home o página deseada
        return redirect()->route('home')->with('success', 'Registro exitoso!');
    }
}
