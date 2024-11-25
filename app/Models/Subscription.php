<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Definir la tabla que usará este modelo, si es diferente a la convencional
    protected $table = 'subscriptions';

    // Los campos que son asignables de forma masiva
    protected $fillable = [
        'user_id',        // ID del usuario
        'card_last_four', // Últimos 4 dígitos de la tarjeta
        'payment_token',  // Token de pago (si usas un sistema como Stripe)
        'is_active',      // Si la suscripción está activa o no
    ];

    // Relación: una suscripción pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class); // Relación inversa con el modelo User
    }
}
