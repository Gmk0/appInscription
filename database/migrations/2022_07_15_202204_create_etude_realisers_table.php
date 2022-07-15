<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudeRealisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('etude_realisers', function (Blueprint $table) {
            $table->id('id_etude');
            $table->string('matricule_etudiant')->unique();
            $table->foreign('matricule_etudiant')
                ->references('matricule_etudiant')
                ->on('etudiants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('Diplome_access', '500');
            $table->string('Cursus_univeristaire', '1000')->nullable();
            $table->engine = "InnoDB";
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
        Schema::dropIfExists('etude_realisers');
    }
}
