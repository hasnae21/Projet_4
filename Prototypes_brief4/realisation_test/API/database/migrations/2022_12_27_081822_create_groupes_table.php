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
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();

            $table->string('Nom_groupe')->nullable();
            $table->string('Logo')->nullable();

            $table->foreignId("Annee_formation_id")
                ->constrained('anne_formation')
                ->onDelete('cascade');

            $table->foreignId("Formateur_id")
                ->constrained('formateur')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupes');
    }
};
