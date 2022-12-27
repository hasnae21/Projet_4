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
            $table->id();

            $table->foreignId("Apprenant_preparation_brief_id")
            ->constrained("Apprenant_preparation_brief")
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId("Groupe_id")
            ->constrained("Groupes")
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
        Schema::dropIfExists('Groupes_preparation_brief');
    }
};
