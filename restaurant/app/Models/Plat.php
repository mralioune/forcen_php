<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $table    = "plat";

    protected $fillable = [
        "Id_Plat_categorie",
        "Nom",
        "Description",
        "Id_statut",
        "Id_users_admin",
        "Date_save"
    ];
}
