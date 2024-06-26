<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lasname',
        'telephone',
        'email',
        'id_role',
        'id_statut',
        'password',
        'tokens_mail',
        'valide_tokens_mail',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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
