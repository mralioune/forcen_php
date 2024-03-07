<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_admin extends Model
{
    use HasFactory;

    protected $table    = "users_admin";

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
}
