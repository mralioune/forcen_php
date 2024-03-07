<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_statut extends Model
{
    use HasFactory;

    protected $table    = "commande_statut";

    protected $fillable = [
        "Nom",
        "Id_statut",
        "Date_save"
    ];
}
