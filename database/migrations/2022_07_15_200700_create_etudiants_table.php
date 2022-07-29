<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_etudiant')->unique();
            $table->string('Nom');
            $table->string('Postnom');
            $table->string('Prenom');
            $table->string('Genre');
            $table->string('Etat_civil');
            $table->string('Nationalite');
            $table->string('Lieu_naiss');
            $table->string('Date_naiss');
            $table->string('Telephone');
            $table->string('Email')->unique();
            $table->string('Adresse_etudiant');
            $table->string('Nom_Pere');
            $table->string('Nom_mere');
            $table->string('Localisation_parent');
            $table->string('Photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table("tuteur_etudiants", function (Blueprint $table) {
            $table->dropForeign("matricule_etudiant");
        });
        Schema::table("dossier_etudiants", function (Blueprint $table) {
            $table->dropForeign("matricule_etudiant");
        });
        Schema::dropIfExists('etudiants');
    }
}
