<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'montant',
        'id_1xbet',
        'statut',
    ];

    protected $casts = [
        'statut' => 'string', // Pour s'assurer que le statut est toujours une chaîne de caractères
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
