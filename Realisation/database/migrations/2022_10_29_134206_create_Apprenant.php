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
        Schema::create('Apprenant', function (Blueprint $table) {
            $table->increments('id');
            $table->string("Nom")->nullable();
            $table->string("Prenom")->nullable();
            $table->string("Email")->nullable();
            $table->decimal("Phone")->nullable();
            $table->string("Adress")->nullable();
            $table->string("CIN")->nullable();
            $table->date("Date_naissance")->nullable();
            $table->string("Image")->nullable();
            // $table->unsignedInteger("promotion_id")->nullable();
            // $table->foreign("promotion_id")
            // ->references("id")
            // ->on('promotions')
            // ->onDelete('cascade');
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
