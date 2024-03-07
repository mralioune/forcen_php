<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table    = "Commande_details";

    protected $fillable = [
        "Numero_reférence",
        "Montant",
        "Id_users_client",
        "Date_save"
    ];
}
