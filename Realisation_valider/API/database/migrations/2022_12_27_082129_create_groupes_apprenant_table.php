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
        Schema::create('groupes_apprenant', function (Blueprint $table) {
            $table->id();

            $table->foreignId("Groupe_id")
            ->constrained('groupes')
            ->onDelete('cascade');

            $table->foreignId("Apprenant_id")
            ->constrained('apprenant')
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
        Schema::dropIfExists('groupes_apprenant');
    }
};
