<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat_composant extends Model
{
    use HasFactory;

    protected $table    = "plat_composant";

    protected $fillable = [
        "Id_plat",
        "Nom",
        "Id_statut",
        "Id_users_admin",
        "Date_save"
    ];
}
