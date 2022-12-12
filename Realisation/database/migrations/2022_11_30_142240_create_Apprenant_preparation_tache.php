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
            $table->unsignedInteger("Preparation_tache_id");
            $table->unsignedInteger("Apprenant_id");
            $table->unsignedInteger("Apprenant_P_Brief_id");
            $table->foreign('Preparation_tache_id')->references('id')->on('Preparation_tache')->onDelete('cascade');
            $table->foreign('Apprenant_P_Brief_id')->references('id')->on('Apprenant_preparation_brief')->onDelete('cascade');
            $table->foreign('Apprenant_id')->references('id')->on('Apprenant')->onDelete('cascade');
            $table->string('Etat')->default('en pouse');
            $table->timestamp("date_debut")->nullable();
            $table->timestamp("date_fin")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_task');
    }
};
