<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuteurEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuteur_etudiants', function (Blueprint $table) {

            $table->id('id_tuteur');
            $table->string('matricule_etudiant')->unique();
            $table->foreign('matricule_etudiant')
                ->references('matricule_etudiant')
                ->on('etudiants')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('Nom_tuteur')->nullable();
            $table->string('Telephone_tuteur')->nullable();
            $table->string('Adresse_tuteur')->nullable();
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
        Schema::dropIfExists('tuteur_etudiants');
    }
}
