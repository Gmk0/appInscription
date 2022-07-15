<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultes', function (Blueprint $table) {
            $table->id('id_faculte');
            $table->string('designation_faculte');
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
        Schema::create('promotions', function (Blueprint $table) {
            $table->dropForeign('id_faculte');
        });
        Schema::dropIfExists('facultes');
    }
}
