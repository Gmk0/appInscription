<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatEcclesialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat_ecclesials', function (Blueprint $table) {
            $table->id('id');
            $table->string('matricule_etudiant')->unique();
            $table->foreign('matricule_etudiant')
                ->references('matricule_etudiant')
                ->on('etudiants')
                ->onDelete('cascade')
                ->cascadeOnUpdate();
            $table->string('institut');
            $table->string('sigle');
            $table->string('etat');
            
  
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
        Schema::dropIfExists('etat_ecclesials');
    }
}
