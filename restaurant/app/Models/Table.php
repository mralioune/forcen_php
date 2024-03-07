<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table    = "tables";

    protected $fillable = [
        "Id_salle",
        "Nom",
        "Id_statut",
        "Id_users_admin",
        "Date_save"
    ];
}
