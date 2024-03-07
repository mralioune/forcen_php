<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    use HasFactory;

    protected $table    = "jour";

    protected $fillable = [
        "Nom",
        "Id_statut",
        "Date_save"
    ];
}
