<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiement_frais', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_etudiant')->unique();
            $table->foreign('matricule_etudiant')
                ->references('matricule_etudiant')
                ->on('etudiant_inscrits')
                ->onDelete('cascade')
                ->cascadeOnUpdate();
            $table->string('id_payement');
            $table->string('client');
            $table->string('montant');
            $table->string('libelle');

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
        Schema::dropIfExists('paiement_frais');
    }
}
