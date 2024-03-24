<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_client extends Model
{
    use HasFactory;

    protected $table    = "users_client";

    protected $fillable = [
        "Prenom",
        "Nom",
        "Email",
        "Telephone",
        "Password",
        "Tokens_mail",
        "Valide_tokens_mail",
        "Id_statut",
        "Id_role",
        "Date_inscription"
    ];
    
    static function generateToken($length = 32) {
        // Générer un identifiant unique
        $token = uniqid();
    
        // Convertir l'identifiant en hexadécimal
        $token = bin2hex($token);
    
        // Tronquer la chaîne au nombre de caractères souhaité
        $token = substr($token, 0, $length);
    
        return $token;
    }
}
