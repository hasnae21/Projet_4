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
        Schema::create('Preparation_brief', function (Blueprint $table) {
            $table->increments('id');
            $table->string("Nom_du_brief")->nullable();
            $table->string("Description")->nullable();
            $table->decimal("Duree")->nullable();

            $table->unsignedInteger("Formateur_id")->nullable();
            $table->foreign("Formateur_id")
            ->references("id")
            ->on('Formateur')
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
        Schema::dropIfExists('briefs');
    }
};
