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
        Schema::create('users_admin', function (Blueprint $table) {
            $table->id("Id");
            $table->string('Prenom');
            $table->string("Nom");
            $table->string("Email");
            $table->string("Telephone");
            $table->string("Password");
            $table->string("Tokens_mail");
            $table->integer("Valide_tokens_mail");
            $table->integer("Id_statut");
            $table->integer("Id_role");
            $table->dateTime("Date_inscription");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_admin');
    }
};
