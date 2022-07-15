<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_etudiants', function (Blueprint $table) {
            $table->string('matricule_etudiant')->unique();
            $table->foreign('matricule_etudiant')->references('matricule_etudiant')->on('etudiants')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('Aptitude_physique')->nullable();
            $table->string('Certificat_naiss')->nullable();
            $table->string('Diplome_etat')->nullable();
            $table->string('Bulletin')->nullable();
            $table->string('recommandation')->nullable();
            $table->engine = "InnoDB";
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossier_etudiants');
    }
}
