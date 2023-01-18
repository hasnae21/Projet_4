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
        Schema::create('brief', function (Blueprint $table) {
            $table->id();
            $table->date('Date_affectation')->nullable();

            $table->foreignId('Preparation_brief_id')
                ->constrained('preparation_brief')
                ->onDelete('cascade');

            $table->foreignId('Apprenant_id')
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
        Schema::dropIfExists('brief');
    }
};
