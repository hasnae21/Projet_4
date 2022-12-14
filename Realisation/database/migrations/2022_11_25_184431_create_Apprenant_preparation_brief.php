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
        Schema::create('Apprenant_preparation_brief', function (Blueprint $table) {
            $table->id();
            $table->date('Date_affectation')->nullable();

            //     $table->unsignedInteger("Preparation_brief_id")->nullable();
            //     $table->foreign('Preparation_brief_id')->references('id')->on('Preparation_brief')->onDelete('cascade');
            //     $table->unsignedInteger("Apprenant_id")->nullable();
            //     $table->foreign('Apprenant_id')->references('id')->on('Apprenant')->onDelete('cascade');

            $table->foreignId("Preparation_brief_id")
            ->constrained("Preparation_brief")
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
        Schema::dropIfExists('Apprenant_preparation_brief');
    }
};
