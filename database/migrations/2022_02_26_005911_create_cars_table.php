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
            $table->string('make');
            $table->string('model');
            $table->string('plate');
            $table->string('color');
            $table->integer('kms');
            $table->year('year');
            $table->decimal('value',9,3);   
            $table->integer('last_revision');
            $table->integer('next_revision');
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
