<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaDepartamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {Schema::dropIfExists('departamentos');
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id('clave')->autoIncrement();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('area')->nullable();           
            $table->integer('estatus')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('area')->references('clave')->on('areas')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
