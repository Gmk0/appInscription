<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantInscritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_inscrits', function (Blueprint $table) {
            $table->id('id_inscrit');
            $table->string('matricule_etudiant')->unique();
            $table->foreign('matricule_etudiant')
                ->references('matricule_etudiant')
                ->on('etudiants')
                ->onDelete('cascade')
                ->cascadeOnUpdate();
            $table->foreignId('id_promotion');

            $table->foreignId('id_annee');

            $table->string('statut_etudiant')->nullable()->default('0');

            $table->timestamps();
            $table->engine = "InnoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiant_inscrits');
    }
}
