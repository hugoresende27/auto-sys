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
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('make_id');
            $table->foreign('make_id')->references('code')->on('makes');
            $table->string('code')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('make')->references('code')->on('makes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
};