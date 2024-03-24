<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plat', function (Blueprint $table) {
            $table->id("Id");
            $table->string("Id_plat_categorie");
            $table->string("Nom");
            $table->string("Description");
            $table->integer("Id_statut");
            $table->integer("Id_users_admin");
            $table->dateTime("Date_save");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plat');
    }
};
