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
        // Schema::create('makes', function (Blueprint $table) {
         
        //     $table->id();
        //     $table->string('code')->unique();
        //     $table->string('title');
        //     $table->timestamps();
        // });

        // Schema::create('manus', function (Blueprint $table) {
         
        //     $table->id();
        //     $table->string('make');
        //     $table->string('model');
        //     $table->year('year');
        //     $table->timestamps();
        // });
        Schema::create('manus', function (Blueprint $table) {
         
            $table->id();
            $table->string('make')->unique();
         
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
        Schema::dropIfExists('manus');
    }
};
