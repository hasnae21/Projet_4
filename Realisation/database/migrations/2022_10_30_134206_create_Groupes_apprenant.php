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
        Schema::create('Groupes_apprenant', function (Blueprint $table) {
            $table->id();

            // $table->unsignedInteger("Groupe_id")->nullable();
            // $table->foreign("Groupe_id")
            // ->references("id")
            // ->on('Groupes')

            // $table->unsignedInteger("Apprenant_id")->nullable();
            // $table->foreign("Apprenant_id")
            // ->references("id")
            // ->on('Apprenant')

            $table->foreignId("Groupe_id")
            ->constrained("Groupes")
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId("Apprenant_id")
            ->constrained("Apprenant")
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
        Schema::dropIfExists('Groupes_apprenant');
    }
};
