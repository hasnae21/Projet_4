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
        Schema::create('Preparation_tache', function (Blueprint $table) {
            $table->id();
            $table->string("Nom_tache")->nullable();
            $table->string("Description")->nullable();
            $table->decimal("Duree")->nullable();

            // $table->unsignedInteger("Preparation_brief_id")->nullable();
            // $table->foreign("Preparation_brief_id")
            // ->references("id")
            // ->on('Preparation_brief')
            // ->onDelete('cascade');

            $table->foreignId("Preparation_brief_id")
            ->constrained("Preparation_brief")
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('Preparation_tache');
    }
};
