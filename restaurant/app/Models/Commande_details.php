<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_details extends Model
{
    use HasFactory;

    protected $table    = "commande_details";

    protected $fillable = [
        "Id_commande",
        "Id_plat",
        "Quantite",
        "Montant",
        "Date_save"
    ];
}
