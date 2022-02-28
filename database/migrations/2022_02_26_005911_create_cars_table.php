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
        Schema::create('cars', function (Blueprint $table) {

            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('make')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('model')->nullable();

            $table->string('plate')->nullable();
            $table->string('color')->nullable();
            $table->integer('kms')->nullable();
            $table->year('year')->nullable();
            $table->decimal('value',9,3)->nullable();   
            $table->integer('last_revision')->nullable();
            $table->integer('next_revision')->nullable();
            $table->string('driver')->nullable();
            $table->string('details')->nullable();

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
        Schema::dropIfExists('cars');
    }
};
