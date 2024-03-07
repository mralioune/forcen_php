<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_commande extends Model
{
    use HasFactory;

    protected $table    = "type_commande";

    protected $fillable = [
        "Nom",
        "Id_statut",
        "Date_save"
    ];
}
