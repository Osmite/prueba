<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaColores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('colores', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombreEsp')->nullable();
            $table->string('nombreEng')->nullable();
            $table->string('codigo')->nullable();
            $table->string('tipo')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //Schema::dropIfExists('colores');
    }
}
