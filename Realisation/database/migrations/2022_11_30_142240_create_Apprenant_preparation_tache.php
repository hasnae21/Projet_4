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
        Schema::create('Apprenant_preparation_tache', function (Blueprint $table) {
            $table->id();
            $table->string('Etat')->default('en pouse');
            $table->timestamp("date_debut")->nullable();
            $table->timestamp("date_fin")->nullable();

            // $table->unsignedInteger("Preparation_tache_id");
            // $table->foreign('Preparation_tache_id')->references('id')->on('Preparation_tache')->onDelete('cascade');
            // $table->unsignedInteger("Apprenant_id");
            // $table->foreign('Apprenant_id')->references('id')->on('Apprenant')->onDelete('cascade');
            // $table->unsignedInteger("Apprenant_P_Brief_id");
            // $table->foreign('Apprenant_P_Brief_id')->references('id')->on('Apprenant_preparation_brief')->onDelete('cascade');
        
            $table->foreignId("Preparation_tache_id")
            ->constrained("Preparation_tache")
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId("Apprenant_id")
            ->constrained("Apprenant")
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId("Apprenant_P_Brief_id")
            ->constrained("Apprenant_preparation_brief")
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
        Schema::dropIfExists('Apprenant_preparation_tache');
    }
};
