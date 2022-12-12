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
        Schema::create('Groupes_preparation_brief', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("Apprenant_preparation_brief_id")->nullable();
            $table->foreign("Apprenant_preparation_brief_id")
            ->references("id")
            ->on('Apprenant_preparation_brief')
            ->onDelete('cascade');

            $table->unsignedInteger("Groupe_id")->nullable();
            $table->foreign("Groupe_id")
            ->references("id")
            ->on('Groupes')
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
        Schema::dropIfExists('students');
    }
};
