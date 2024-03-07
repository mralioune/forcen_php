<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande_users extends Model
{
    use HasFactory;

       protected $table    = "commande_users";

    protected $fillable = [
        "Id_commande",
        "Id_table",
        "Id_type_commande",
        "Id_users_client",
        "Id_statut",
        "Id_users_admin",
        "Date_save"
    ];
}
