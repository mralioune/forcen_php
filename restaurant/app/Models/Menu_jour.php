<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_jour extends Model
{
    use HasFactory;

    protected $table    = "menu_jour";

    protected $fillable = [
        "Id_plat",
        "Id_jour",
        "Id_statut",
        "Id_users_admin",
        "Date_save"
    ];
}
