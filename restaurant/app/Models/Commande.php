<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table    = "commande";

    protected $fillable = [
        "Numero_reference",
        "Montant",
        "Id_users_client",
        "Date_save"
    ];

    static function generateReference() {
        // Obtenir la date et l'heure actuelles au format UNIX timestamp
        $timestamp = time();
        
        // Générer un identifiant unique
        $unique_id = uniqid();
        
        // Concaténer la date/heure et l'identifiant unique pour former le numéro de facture
        $invoice_number = date('YmdHis', $timestamp) . $unique_id;
        
        return $invoice_number;
    }
}
