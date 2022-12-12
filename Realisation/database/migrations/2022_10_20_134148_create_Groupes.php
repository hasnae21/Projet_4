<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Groupes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nom_groupe')->nullable();
            $table->unsignedInteger("Annee_formation_id")->nullable();
            $table->foreign("Annee_formation_id")
                ->references("id")
                ->on('Annee_formation')
                ->onDelete('cascade');
            $table->unsignedInteger("Formateur_id")->nullable();
            $table->foreign("Formateur_id")
                ->references("id")
                ->on('Formateur')
                ->onDelete('cascade');

            $table->string('Logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};
